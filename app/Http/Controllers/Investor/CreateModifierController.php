<?php

namespace App\Http\Controllers\Investor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModifierBreakEven;
use App\Http\Requests\StoreModifierCloseAll;
use App\Http\Requests\StoreModifierCancel;
use App\Http\Requests\StoreModifierMoveStopLoss;
use App\Models\Signal;
use App\Models\Modifier;
use App\Models\Operation;
use Illuminate\Support\Facades\Auth;

class CreateModifierController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:investor']);
    }

    public function index(Signal $signal = null)
    {

        if ($signal != null) {
            return view('investor.createModifier', compact(['signal'])); 
        }

        return view('investor.createModifier');
    }

    public function storeBreakEven(Signal $signal = null, StoreModifierBreakEven $request)
    {
        $data = $request->validated();

        $modifier = new Modifier([
            'type' => 'break_even',
            'operation_reference' => $data['operation_reference'],
        ]);

        $modifier->user()->associate(Auth::user());

        if ($signal != null) {
            $modifier->signal()->associate($signal);
            $signal->interpreted = True;
            $signal->save();
        }

        $modifier->save();

        $operation = Auth::user()->operations()->where('status', 'open')->where('id', $data['operation_reference'])->first();

        $operation->stop_loss = $operation->price;
        $operation->save();

        return redirect()->route('investor.openOperations')->with('success', 'Modificador Break Even creado correctamente.');
    }

    public function storeCloseAll(Signal $signal = null, StoreModifierCloseAll $request)
    {
        $data = $request->validated();

        $modifier = new Modifier([
            'type' => 'close_all',
            'currency_pair' => $data['currency_pair'],
        ]);

        $modifier->user()->associate(Auth::user());

        if ($signal != null) {
            $modifier->signal()->associate($signal);
            $signal->interpreted = True;
            $signal->save();
        }

        $modifier->save();

        Auth::user()->operations()->where('status', 'open')->where('currency_pair', $data['currency_pair'])->update(['status' => 'close']);

        return redirect()->route('investor.openOperations')->with('success', 'Cerradas las operaciones con el par mondea: ' . $modifier->currency_pair);
    }

    public function storeCancel(Signal $signal = null, StoreModifierCancel $request)
    {
        $data = $request->validated();

        $modifier = new Modifier([
            'type' => 'cancel',
            'operation_reference' => $data['operation_reference'],
        ]);

        $modifier->user()->associate(Auth::user());

        if ($signal != null) {
            $modifier->signal()->associate($signal);
            $signal->interpreted = True;
            $signal->save();
        }

        $modifier->save();

        Auth::user()->operations()->where('status', 'open')->where('id', $data['operation_reference'])->update(['status' => 'close']);

        return redirect()->route('investor.openOperations')->with('success', 'Operación cancelada exitosamente.');
    }

    public function storeMoveStopLoss(Signal $signal = null, StoreModifierMoveStopLoss $request)
    {
        $data = $request->validated();

        $modifier = new Modifier([
            'type' => 'move_stop_loss',
            'operation_reference' => $data['operation_reference'],
            'price' => $data['price'],
        ]);

        $modifier->user()->associate(Auth::user());

        if ($signal != null) {
            $modifier->signal()->associate($signal);
            $signal->interpreted = True;
            $signal->save();
        }

        $modifier->save();

        $operation = Auth::user()->operations()->where('status', 'open')->where('id', $data['operation_reference'])->first();

        $operation->stop_loss = $data['price'];
        $operation->save();

        return redirect()->route('investor.openOperations')->with('success', 'Stop Loss movido existosamente.');
    }
    
    public function showForm(String $type, Signal $signal = null) 
    {

        $validTypes = ['breakEven', 'closeAll', 'cancel', 'moveStopLoss'];

        if (in_array($type, $validTypes)) { 

            $operations = Auth::user()->operations()->where('status', 'open')->orderBy('id', 'DESC')->get();

            if ($signal != null) {
                return redirect()->route('investor.createModifier.signal', $signal->id)->with($type, True)->with('operations', $operations);
            } else {
                return redirect()->route('investor.createModifier')->with($type, True)->with('operations', $operations);
            }
        } 
        else { 
            if ($signal != null) {
                return redirect()->route('investor.createModifier.signal', $signal->id);
            } else {
                return redirect()->route('investor.createModifier');
            } 
        } 

    }
    
}
