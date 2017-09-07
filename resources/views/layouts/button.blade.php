      @if (auth()->check())
      <!-- FIXED ACTION BUTTON START-->
      <div class="new-ticket">
        <a href="/tickets/new" class="btn-floating btn-large waves-effect waves-light">
          <i class="material-icons">add</i>
        </a>
      </div> 
      <!-- FIXED ACTION BUTTON END -->
      @endif