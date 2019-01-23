<div style="margin:0px 50px 0px 50px;">    
	@if($services)	
	<table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Имя</th>
                <th>Текст</th>
                <th>Изображение</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
		@foreach($services as $k => $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>  {!! Html::link(route('servicesEdit',['service'=>$service->id]),$service->name,['alt'=>$service->name]) !!}  </td>
                <td>{{$service->text}}</td>
				<td>{!! Html::image('img/'.$service->icon,'', array('style' => 'width:150px' )) !!}</td>
                <td>	
                
                {!! Form::open(['url' => route('servicesEdit',['service'=>$service->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
				    {{ method_field('DELETE') }}
				    {!! Form::button('Удалить', ['class' => 'btn btn-danger','type'=>'submit']) !!}
				{!! Form::close() !!}
				</td>
            </tr>
		@endforeach	
        </tbody>
    </table>
	{{ $services->appends(['sort' => 'votes'])->fragment('foo')->links() }}
	@endif
	
	{!! Html::link(route('servicesAdd'),'Новый сервис') !!}
</div>