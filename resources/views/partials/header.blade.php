<header role="banner">
     
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand absolute" href="{{url('/')}}">Main Test</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
                        <ul class="navbar-nav absolute-right">
                          <li ><a style="margin-right: 25px;" href="{{ route('inventories.index') }}">inventory</a></li>
                          <li ><a style="margin-right: 25px;" href="{{ route('users.index') }}">user</a></li>
                          <li ><a href="{{ route('products.index') }}">product</a></li>
         
                                    </ul>

          </div>
        </div>
      </nav>
    </header>


  
                        