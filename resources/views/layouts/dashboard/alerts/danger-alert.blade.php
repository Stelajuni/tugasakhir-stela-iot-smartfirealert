@if ($errors->any())
    <div class="alert text-white bg-danger" role="alert">
        <div class="iq-alert-icon">
            <i class="ri-information-line"></i>
        </div>
        <div class="iq-alert-text">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
