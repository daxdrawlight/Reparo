    <!-- NAVIGATION START -->     

      <div class="navbar">
        <nav>
        <div class="container">
          <div class="nav-wrapper">
              <a href="/" class="brand-logo">Reparo</a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                @include ('layouts.partials.nav_items')
              </ul>
              <ul class="side-nav" id="mobile-demo">
              <li><div class="user-view">
                <div class="background">
                  <img src="images/laptop.jpeg">
                </div>
                  <a href="#!user"><img class="circle" src="images/denko.jpeg"></a>
                  <a href="#!name"><span class="white-text name">John Doe</span></a>
                  <a href="#!email"><span class="white-text email">johndoe@email.com</span></a>
                </div>
              </li>
                @include ('layouts.partials.nav_items')
              </ul>
            </div>
        </div>
        </nav>
      </div>
      <!-- NAVIGATION END -->