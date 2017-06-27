<div class="impersonate">
    @if (impersonate()->isActive())
        <div>
            Impersonating: <span>{{ user()->fullname }}</span>
        </div>

        <a href="{{ route('impersonate.logout') }}"
           onclick="event.preventDefault(); document.getElementById('impersonate-logout-form').submit();">
            Return to original user
        </a>

        <form id="impersonate-logout-form" action="{{ route('impersonate.logout') }}" method="post" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endif

    <form action="{{ route('impersonate.login', 2) }}" method="post">
        {{ csrf_field() }}
        {{-- optional redirect input (to override the default return back();) --}}
        <input name="redirect_to" type="hidden" value="/">
        <a>Impersonate User 2</a>
    </form>
</div>