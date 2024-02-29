<nav class="navbar navbar-expand-lg navbar-dark bg-success">

        <ul class="navbar-nav">
          <!--kondisi sudah login-->
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i> Welcome, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
          <!--kondisi sebelum login-->
          <li class="nav-item">
            <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>
