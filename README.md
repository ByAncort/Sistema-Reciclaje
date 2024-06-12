

## Acknowledgements

 - [Diagrama DB](https://lucid.app/lucidchart/7efca32e-d35c-4f03-a0f8-7aff4f9de381/edit?viewport_loc=-200%2C-610%2C2368%2C1270%2C0_0&invitationId=inv_14521455-a18e-4d9c-a6ca-4b9407901bea)
 

# Funciones Iecos

## Tabla de estado de  recompensas solo retornamos informacion

https://www.iecos.cl/canjeos-recompensas

```php
class CanjeosRecompensas extends Component
{
    public function render()
    {
        $canjeos = DB::table('canjeos')
        ->join('users', 'canjeos.user_id', '=', 'users.id')
        ->select('canjeos.*', 'users.email as user_email','users.name')
        ->get();
        // dd($canjeos);
        return view('livewire.canjeos-recompensas')->with('canjeos', $canjeos);
    }
    public function actualizarEstado($canjeoId)
    {
        DB::table('canjeos')
            ->where('id', $canjeoId)
            ->update(['estado' => 'Entregado']); 
    }
}
```

## Class dashboard solo devolvemos información

 https://www.iecos.cl/dashboard

```php
class Dashboard extends Component
{
    public function render()
    {
        $user_id = Auth::id();
        $cantidadReciclada = DB::table('recyclable_items')->where('user_id', $user_id)->sum('quantity');
        $porcentajeIncremento = 55;
        $puntosQuery = DB::table('users')->select('puntos')->where('id', $user_id)->first();
// dd($puntos);
        $puntos = $puntosQuery->puntos;

        $ultimoMov = DB::table('recyclable_items')
        ->select('recyclable_items.*', 'recycling_types.name as recycling_type_name')
        ->join('recycling_types', 'recycling_types.id', '=', 'recyclable_items.recycling_type_id')
        ->where('recyclable_items.user_id', $user_id)
        ->get();
        // dd($ultimoMov);
        $count = DB::table('users')->count(); 
        $canjeos = DB::table('canjeos')
    ->join('users', 'canjeos.user_id', '=', 'users.id')
    ->select('canjeos.*', 'users.email as user_email')
    ->where('canjeos.user_id', $user_id)
    ->get();
        // dd($canjeos);

    $totalCantidad = DB::table('canjeos')
    ->where('user_id', $user_id)
    ->count();

    return view('livewire.dashboard', [
        'count' => $count,
        'cantidadReciclada' => $cantidadReciclada,
        'porcentajeIncremento' => $porcentajeIncremento,
        'puntos' => $puntos,
        'ultimoMovimiento' => $ultimoMov ,
        'canjeos' => $canjeos ,
        'totalCantidad'=>$totalCantidad

    ]);
    
    }
```

 

## Class de reciclaje donde hacemos la formula para el reciclaje

https://www.iecos.cl/reciclable

- formula de los puntos x reciclaje 
sacamos la cantidad de puntos por 1000g del reciclaje lo dividimos entre este mismo y tenemos los puntos por 1g  multiplicamos por cantidad ingresada

```php
   // Busca el puntaje por kilo correspondiente al tipo de reciclaje seleccionado
            $puntaje = DB::table('puntajes')
                        ->where('recycling_type_id', $this->selectedTypeId)
                        ->first();
                        
 // Calcula los puntos según la cantidad reciclada y el puntaje por kilo
                $weight = intval($puntaje->weight);
                $point=$puntaje->point;
                $puntosxkg=$point/$weight;
                $puntos = intval($quantity * $puntosxkg);
```

Clase completa

```php
class Reciclable extends Component
{
    // inicializamos variables bases
    public $successMessage = false;
    public $quantity;
    public $selectedTypeId;
    public $userId;
    public $userName;
    public $userEmail;
    public $userPhone;
    public $userLocation;
    public $userAbout;
    public $userRoleId;

    public function render()
    {
        $tipos = DB::table('recycling_types')->get();
        $users = DB::table('users')->get();
        return view('livewire.reciclable', compact('tipos', 'users'));
    }

    public function saveReciclable()
    {
        $this->validate([
            'quantity' => 'required|numeric|min:0',
            'selectedTypeId' => 'required|exists:recycling_types,id',
            'userId' => 'required|exists:users,id', 
        ]);
    
        // Obtiene la información del usuario
        $user = DB::table('users')->where('id', $this->userId)->first();
    
        if ($user) {
            // Obtiene el nombre, correo electrónico y rol del usuario
            $this->userName = $user->name;
            $this->userEmail = $user->email;
            $this->userRoleId = $user->role_id;
    
            // Obtiene la cantidad de reciclaje
            $quantity = intval($this->quantity);
    
            // Inicializa los puntos
            $puntos = 0;
    
            // Busca el puntaje por kilo correspondiente al tipo de reciclaje seleccionado
            $puntaje = DB::table('puntajes')
                        ->where('recycling_type_id', $this->selectedTypeId)
                        ->first();
    
            if ($puntaje) {
                // Calcula los puntos según la cantidad reciclada y el puntaje por kilo
                $weight = intval($puntaje->weight);
                $point=$puntaje->point;
                $puntosxkg=$point/$weight;
                $puntos = intval($quantity * $puntosxkg);
                // dd($puntos);
            } else {
                // Si no se encuentra un puntaje por kilo para el tipo de reciclaje seleccionado, muestra un mensaje de error
                session()->flash('error', 'No se encontró el puntaje correspondiente al tipo de reciclaje seleccionado');
                return;
            }
    
            // Actualiza el puntaje del usuario
            $nuevoPuntaje = $user->puntos + $puntos;
            DB::table('users')->where('id', $this->userId)->update(['puntos' => $nuevoPuntaje]);
    
            // Inserta el nuevo elemento reciclable
            DB::table('recyclable_items')->insert([
                'quantity' => $quantity,
                'recycling_type_id' => $this->selectedTypeId,
                'user_id' => $this->userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Reinicia las variables
            $this->quantity = null;
            $this->userId = null;
            $this->selectedTypeId = null;
            $this->successMessage = true;
            session()->flash('success', '¡El reciclaje se ha guardado correctamente!');
        } else {
            // Si no se encuentra el usuario, muestra un mensaje de error
            session()->flash('error', 'Usuario no encontrado');
            return;
        }
    }
    
    

    public function updatedUserId()
    {
        $user = DB::table('users')->where('id', $this->userId)->first();
        if ($user) {
            $this->userName = $user->email;
        } else {
            $this->userName = 'Usuario no encontrado';
        }
    }
}
	

```

## Class de store donde se canjean eh ingresan recompensas

```php
class StoreController extends Component
{
    public function render()
    {
        
        $reward = DB::table('rewards')->get();
 
        return view('livewire.store')->with('reward', $reward);
        
    }
    public function add(Request $request)
    {
        
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'cantidad' => 'required|integer|min:0',
            'points_required' => 'required|integer|min:0',
        ]);

        
        $reward = new Reward();
        $reward->nombre = $data['nombre'];
        $reward->descripcion = $data['descripcion'];
        $reward->cantidad = $data['cantidad'];
        $reward->points_required = $data['points_required'];

        
        $reward->save();

        
        return redirect('/store')->with('success', 'Recompensa creada correctamente.');
    }
    public function shop($rewardId)
    {
        $user_id = Auth::id();
        $puntosQuery = DB::table('users')->select('puntos')->where('id', $user_id)->first();
        $puntos = $puntosQuery->puntos;
    
       
        $reward = Reward::find($rewardId);
        //campos de recompensa canjeada
        $id = $reward->id;
        $nombre = $reward->nombre;
        $descripcion = $reward->descripcion;
        $cantidad = $reward->cantidad;
        $points_required = $reward->points_required;
        $created_at = $reward->created_at;
        $updated_at = $reward->updated_at;

        $cantidad = $reward->points_required;

        if ($puntos >= $cantidad) {
            $res = $puntos - $cantidad;
    
            $cantidad = intval(DB::table('rewards')->where('id', $id)->value('cantidad'));
            $cantidadTotal =$cantidad - 1;
            
            DB::table('rewards')->where('id', $id)->update(['cantidad' => $cantidadTotal]);

            DB::table('users')->where('id', $user_id)->update(['puntos' => $res]);
            DB::table('canjeos')->insert([
                'user_id' =>$user_id,
                'n_recompensa' =>$nombre,
                'estado'=>'pendiente',
                'created_at' => now(),
                
            ]);
            

            
            return redirect('/store')->with('success', 'Compra realizada con éxito!');
        } else {
            
            return redirect('/store')->with('error', 'No tienes suficientes puntos para comprar este premio.');
        }
    }
    
    

}
```

## Clase de tabla valores

https://www.iecos.cl/Valores

en esto mostramos tabla de la base de datos y tambien agregamos un nuevo registro

```php
class Valores extends Component
{
    public $puntajes;
    public $recycling_type_id;
    public $point;
    public $weight;
    public $selectedTypeId;

    public function mount()
    {
        // Cargar los puntajes al iniciar el componente
        $this->cargarPuntajes();
    }

    public function render()
    {
        $tipos = DB::table('recycling_types')->get();
        $asasd = DB::table('puntajes as a')
        ->join('recycling_types as b', 'a.recycling_type_id', '=', 'b.id')
        ->select('a.*', 'b.name as recycling_type_name')
        ->get();

        return view('livewire.valores', [
            'tipos' => $tipos,
            'asasd' => $asasd,
        ]);
    }

    public function cargarPuntajes()
    {
        // Obtener todos los puntajes de la base de datos junto con los nombres de los tipos de reciclaje
        $this->puntajes = DB::table('puntajes as a')
            ->join('recycling_types as b', 'a.recycling_type_id', '=', 'b.id')
            ->select('a.*', 'b.name as recycling_type_name')
            ->get();

            
    }
    
    public function agregarPuntaje()
    {
        // Validación simple para asegurarse de que se hayan ingresado valores
        $this->validate([
            'recycling_type_id' => 'required',
            'point' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);
    
        // Imprimir los valores para verlos antes de la inserción
        // dd([
        //     'recycling_type_id' => $this->recycling_type_id,
        //     'point' => $this->point,
        //     'weight' => $this->weight,
        // ]);
    
        try {
            // Insertar un nuevo puntaje
            DB::table('puntajes')->insert([
                'recycling_type_id' => $this->recycling_type_id,
                'point' => $this->point,
                'weight' => $this->weight,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Recargar los puntajes para reflejar los cambios en la tabla
            $this->cargarPuntajes();
    
            // Limpiar los campos después de agregar el puntaje
            $this->recycling_type_id = null;
            $this->point = null;
            $this->weight = null;
        } catch (\Exception $e) {
            // Capturar cualquier excepción y mostrar un mensaje de error
            session()->flash('error', 'Error al agregar el puntaje: ' . $e->getMessage());
        }
    }
    

}
```

## Register

ya que la pagina se maneja con un sistema de roles en el register siempre se asigna el rol de (users)

```php
    public function register() {
    //Buscamos el ID del rol de tipo Users
        $role_id= DB::table('roles')->where('name', 'users')->value('id');
				// dd($role_id);
		//Creamos user
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'role_id' => $role_id,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
```

## Class de Solicitud de reciclaje

```php
 public $ubicacion;
    public $kg_aprox;

    public function render()
    {
        
        $solicitudes = Solicitud::join('users', 'solicitudes_reciclaje.user_id', '=', 'users.id')
        ->where('solicitudes_reciclaje.user_id', Auth::id())
        ->where('solicitudes_reciclaje.estado', 'pendiente')
        ->select('solicitudes_reciclaje.*', 'users.email')
        ->get();
   
            $solicitudesADM =  Solicitud::join('users', 'solicitudes_reciclaje.user_id', '=', 'users.id')
            ->where('solicitudes_reciclaje.estado', 'pendiente')
            ->select('solicitudes_reciclaje.*', 'users.email')
            ->get();

        return view('livewire.solicitud-reciclaje', [
            'solicitudes' => $solicitudes,
            'solicitudesADM' => $solicitudesADM,
    ]);
    }

    public function marcarRealizado($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado = 'realizado';
        $solicitud->save();

        return redirect('/solicitud');
    }

    public function registrarSolicitud()
    {
        
        $this->validate([
            'ubicacion' => 'required',
            'kg_aprox' => 'required|numeric|min:0',
        ]);

       
        DB::table('solicitudes_reciclaje')->insert([
            'ubicacion' => $this->ubicacion,
            'kg_aprox' => $this->kg_aprox,
            'user_id' => Auth::id(), 
            'estado' => 'pendiente',
            'created_at' => now(),
        ]);

        return redirect('/solicitud');
    }

```

