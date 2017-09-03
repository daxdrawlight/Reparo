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
                @include ('layouts.partials.nav_items')
              </ul>
            </div>
        </div>
        </nav>
      </div>
      <!-- NAVIGATION END -->