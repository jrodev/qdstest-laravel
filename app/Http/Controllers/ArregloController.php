<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arreglo;

class ArregloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return ["id"=>1, "input"=>[[2,8],[5,4]], "output"=>[[8,4],[2,5]], "created_at"=>"10/10/2019", "updated_at"=>"11/10/2019"];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arreglo = new Arreglo();

        // usaremos por esta vez este valor como flag
        // para indicar rotacion de contorno o rotancion total del array
        // 0: Rotacion de contorno, 1: rotacion total de array



        $arreglo->id = $request->id;

        $arreglo->input = $request->input;
        $arreglo->output = $request->output;

        $aInp = $request->input;

        if($arreglo->id==0) {
            $aInp = $this->rotacionContorno($aInp);
        } 
        else {
            $aInp = $this->rotacionTotal($aInp);
        } 
        
        return $aInp;
    }

    // Rotacion total de Array
    private function rotacionTotal ($aInp)
    {
        $lenArray = $lenCols = count($aInp);

        // Array multidimensional de todas la columnas
        $aCols = [];

        // Generando los arreglos internos vacios
        while ($lenCols--) { $aCols[] = []; }

        // Recorriendo el Array para almacenar cada columna
        // en un row del nuevo array $aCols
        for ($y=0; $y < $lenArray; $y++) {
            
            // Recorriendo un Row al revez
            $xAsc = 0; // Recorrido Normal Ascendente
            for ($xDesc=$lenArray-1; $xDesc >= 0; $xDesc--) { 
                
                // Si aun no se tiene un array para una fila
                // que se convertira en columna se crea solo una vez
                /*if( !key_exists($xDesc, $aCols) || !is_array($aCols[$xDesc]) ) { 
                    $aCols[$xDesc] = []; 
                }*/
                $aCols[$xDesc][$y] = $aInp[$y][$xAsc++];
            }
        }
        //var_dump ($aCols);
        return $aCols;
    }

    // Rotacion de contorno de array
    private function rotacionContorno (&$aInp)
    {
        $len = count($aInp);

        // Guardamos los lados del cuadrado (array NxN)

        $aTop    = $aInp[0];      // Parte superior del cuadrado
        $aBottom = $aInp[$len-1]; // Parte inferior del cuadrado

        // Nota: Los lados superior e inferior son primer y ulitmo array 
        // del array multidimensional inicial
        $aLeft = [];  // alamacena los primeros elementos de cada row (Lado Izq)
        $aRight = []; // alamacena los Ultimos elementos de cada row  (Lado Der)

        for ($y=0; $y < $len; $y++) {
            
            $row = $aInp[$y];
            $aLeft[]  = $row[0];      // Primer elemento de este Row
            $aRight[] = $row[$len-1]; // Ultimo elemento de este Row

            // El nuevo primer elemento sera, el Ultimo del lado superior actual
            $aInp[$y][0]      = $aTop[$len-($y+1)];
            // El nuevo Ultimo elemento sera, el Ultimo del lado Inferior actual
            $aInp[$y][$len-1] = $aBottom[$len-($y+1)];
        }

        // ahora solo cambiamos los lados superior e inferior
        $aInp[0]      = $aRight;
        $aInp[$len-1] = $aLeft;

        return $aInp;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
