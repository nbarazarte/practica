<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        
    </head>
    <body>
        
    <div class="container">

        <br><br>

            @if(Session::has('mensaje'))
            
                <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <strong><i class="fa fa-check"></i></strong> {{Session::get('mensaje')}}
                </div>                          
        
            @endif

            @if(Session::has('error'))
            
                <div class="alert alert-danger" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <strong><i class="fa fa-check"></i></strong> {{Session::get('error')}}
                </div>                          
        
            @endif


            <div class="row">

                {!! Form::open(['route' => 'subir', 'id' => 'formulario', 'enctype'=>'multipart/form-data']) !!}                
                                       
                    <div class="col-md-6">
                        
                        <input type="file" id="fichero" name="fichero">
                                
                    </div>

                    <div class="col-md-6">

                        <input type="submit" value="Procesar Fichero">                        

                    </div>

                {!! Form::close() !!}

            </div>

            <h1>Datos</h1>
            
            <table class="table" id="datos" >
                
                <thead>
                        
                        <tr>
                             <th>Albaran</th>
                             <th>Destinatario</th>
                             <th>Dirección</th>
                             <th>Población</th>
                             <th>CP</th>   
                             <th>Provincia</th>
                             <th>Teléfono</th>
                             <th>Observaciones</th>
                             <th>Fecha</th>

                        </tr>

                </thead>




            </table>

    </div>

    </body>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

        <script>

            $(document).ready(function(){
                $('#datos').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('tabla')}}",
                    "columns": [
                        {data: 'albaran'},
                        {data: 'destinatario'},
                        {data: 'direccion'},
                        {data: 'poblacion'},
                        {data: 'cp'},
                        {data: 'provincia'},
                        {data: 'telefono'},
                        {data: 'observaciones'},
                        {data: 'fecha'},
                    ]
                } );
            });

        </script>

</html>
