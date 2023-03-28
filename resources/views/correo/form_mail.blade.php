



<div style="color: black;" class="container">
	<div class="row">
		<div class="col-sm-5">
<body>

			<h1 class="page-header">Envio de Correo</h1>
					<h4>Nuevo Mensaje
					</h4>
					<br/>
					{!! Form::open(['url'=>'/enviar_correo','role'=>'form','enctype'=>'multipart/form-data']) !!}

						{!! Form::label('destinatario','Para:',['class'=>'control-label']) !!}

						{!! Form::text('destinatario',null,['placeholder'=>'Ingresa a la direccion de destino','required','class'=>'form-control']) !!}
						<br/>
						<br/>
						{!! Form::label('asunto','Asunto:',['class'=>'control-label']) !!}

						{!! Form::text('asunto',null,['placeholder'=>'Asunto','required','class'=>'form-control']) !!}
						<br/>
						<br/>
						{!! Form::label('contenido_mail','Contenido:',['class'=>'control-label']) !!}

						{!! Form::textarea('contenido_mail',null,['placeholder'=>'Contenido','required','class'=>'form-control']) !!}
						<br/>
						<br/>

					{!!Form::submit('Enviar',['class'=>'btn btn-primary']) !!}

					{!! Form::close() !!}

</body>
		</div>
	</div>
</div>
