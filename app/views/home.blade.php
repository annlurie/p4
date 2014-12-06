@extends('master')

@section ('title')
	Developer's Best Friend
@stop

@section ('content')

    <!-- Main jumbotron for headline content/description -->
    <div class="jumbotron">
      <div class="container">
        <h1>Developer's Best Friend</h1>
        <p>Use the tools on this site to generate placeholder (fake) content for your website.
          You can generate a lot of Latin-ish text to use in your layouts, or a lot of human-ish
          'users' who may have the suffix 'Esq.' at the end of their names.</p>
      </div>
    </div>

    <!-- Two panels describing individual tools -->
    <div class="container">
    <div class="row">
        <!--Users panel-->
        <div class="col-md-4">
          <h2>Fake Some Users</h2>
          <p>Click the button below to create up to 99 fake users. You'll get a list of names, as well as other 
            qualities (like email addresses) if you like. </p>
          <p><a class="btn btn-default" href="/users" role="button">Let's Get Fakin'! &raquo;</a></p>
        </div>
        <!--Lorem Ipsum panel-->
        <div class="col-md-4">
          <h2>Fake Some Text</h2>
          <p>Click the button below to crate up to 99 paragraphs of fake text. It'll be in the form of pseudo-Latin
            gibberish so it doesn't distract from the visual and design components of your layout, because we know
            how clients can be.</p>
          <p><a class="btn btn-default" href="/lipsum" role="button">Let's Get Fakin'! &raquo;</a></p>
       </div>
    </div> <!--Closing row-->
    </div> <!--Closing container-->
  <!-- /panels -->

@stop