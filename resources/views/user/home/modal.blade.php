 {{-- modal box for gust user --}}
 <div class="modal fade " style=" z-index:99999" id="guestUser" tabindex="-1" aria-labelledby="guestUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="guestUserLabel">Sign Up </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          To book hotel rooms, Register now!.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="{{ url('/register')}}" type="button"  class="btn btn-primary">Sign Up</a>
        </div>
      </div>
    </div>
</div>
