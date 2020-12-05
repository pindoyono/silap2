  <!-- Main Sidebar Container -->
  <aside style="background-color: #938876;" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home')}}" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Kejaksaan Negeri</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @role('admin')
          <li class="nav-item">
            <a href="{{ route('users.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('pidum.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('musnah.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Musnah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kembali.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Kembali
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('rampas.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Rampas
              </p>
            </a>
          </li>
          @endrole
          @role('pidum')
          <li class="nav-item">
            <a href="{{ route('pidum.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('musnah.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Musnah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kembali.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Kembali
              </p>
            </a>
          </li>
          @endrole
          @role('bin')
          <li class="nav-item">
            <a href="{{ route('pidum.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('musnah.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Musnah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kembali.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Kembali
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('rampas.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Rampas
              </p>
            </a>
          </li>
          @endrole
          @role('kajari')
          <li class="nav-item">
            <a href="{{ route('pidum.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('musnah.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Musnah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kembali.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Kembali
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('rampas.index')}}" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                BB Rampas
              </p>
            </a>
          </li>
          @endrole
          <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <i class="fas fa-door-open"></i>
                  <p>
                    Keluar
                  </p>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

