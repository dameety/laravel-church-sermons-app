<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Church Sermons - Home</title>

        <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('/css/semantic.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ URL::asset('/css/user/style.css') }}" type="text/css">
    </head> 
    <body>
    <div class="navigation-bar">
        <nav role="navigation" class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ route('userhome_path') }}" class="navbar-brand">ChurchSermons</a>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav"></ul>
                <form role="search" class="navbar-form navbar-left">
                    <div class="form-group large">
                        <input type="text" placeholder="Search" class="form-control">
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/user/profile') }}"> <button type="button" class="btn btn-primary">Profile</button></a></li>
                    <li><a href="{{ url('/logout') }}"> <button type="button" class="btn btn-danger">Logout</button></a></li>
                </ul>   
            </div>
        </nav>
    </div> {{-- END OF THE HEADER --}}
    
    <div>
        {{-- <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail caption">
              <div class="">
                <h3>Thumbnail label</h3>
                <p>it was about the fact that it was about the fact that it was about the fact that it was about the fact that</p>
                <p class="actionButtons"><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
              </div>
            </div>

          </div>
        </div>         --}}
    </div>

    {{-- <div class="panel panel-default">

  <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">Notes</h3>

    <div class="btn-group pull-right">
      <a class="btn btn-primary" href="#"
        data-toggle="modal"
        data-target="#editModal">
          <i class="fa fa-plus"></i>
          <span>Add</span>
      </a>
    </div>
    
  </div>

  <div class="list-group">

    <a class="list-group-item pjax" href="/notes/id">
      <i class="fa fa-phone fa-2x pull-left"></i>
      <h4 class="list-group-item-heading">Subject</h4>
      <p class="list-group-item-text">Date</p>
    </a>
    
    <a class="list-group-item pjax" href="/notes/id">
      <i class="fa fa-phone fa-2x pull-left"></i>
      <h4 class="list-group-item-heading">Subject</h4>
      <p class="list-group-item-text">Date</p>
    </a>

    ...
    
  </div>
  
  <div class="panel-footer">
    <small class="pull-left">List Card Footer</small>
  </div>  

</div> --}}
<div class="container">
    <div class="ui raised card">
  <div class="content">
    <div class="header">Cute Dog Another Dog, Big dog, cray dog, nomad dog</div>
    <div class="meta">
      <span class="category">Animals</span>
    </div>
    <br>
    <br>
    <div class="description">
      <p>this is boatload of content waiting to be use. a paragraph ni jare</p>
    </div>
    <div class="description">
      <p>this is boatload of content waiting to be use. a paragraph ni jare</p>
    </div>
  </div>
  <div class="extra content">
    <div class="right floated author">
      <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt
    </div>
    <div class="left floated author">
      <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt
    </div>
  </div>
</div>
</div> 

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/semantic.min.js') }}"></script>
    </body>
</html>                                   