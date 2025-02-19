<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="dashboard">
          <span>
            Food Ecommerce
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav " style="flex-grow: 1; margin-left: 50px">
          <?php
            $urlMeat = '/dashboard/' . 'Meat';
            $urlVegetable = '/dashboard/' . 'Vegetable';
            $urlVitamin = '/dashboard/' . 'Vitamin';
          ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $urlMeat; ?>">Meat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $urlVegetable; ?>">Vegetable</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $urlVitamin; ?>">Vitamin</a>
          </li>
          </ul>
          <div class="user_option">
            @if(Route::has('login'))
              @auth
              <a href="mycart">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                [{{$count}}]
              </a>
              <form method="POST" action="logout">
                @csrf
                <input class="btn btn-danger" type="submit" value="Logout">
              </form>
              @else
            <a href="login">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="register">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                Register
              </span>
            </a>
            @endauth
          @endif
            
            
          </div>
        </div>
      </nav>
    </header>