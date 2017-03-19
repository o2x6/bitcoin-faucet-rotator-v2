@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Payment Processor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($paymentProcessor, ['route' => ['payment-processors.update', $paymentProcessor->slug], 'method' => 'patch']) !!}

                        @include('payment_processors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection