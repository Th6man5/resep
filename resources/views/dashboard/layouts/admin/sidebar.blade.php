  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="position-sticky pt-3">
          <ul class="nav flex-column">
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }} " href="/admin/dashboard">
                      <span data-feather="home" class="align-text-bottom"></span>
                      Dashboard
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('admin/dashboard/recipe*') ? 'active' : '' }} "
                      href="/admin/dashboard/recipe">
                      <span data-feather="package" class="align-text-bottom"></span>
                      Recipes
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }} text-light"
                      href="/dashboard/kategori">
                      <span data-feather="database" class="align-text-bottom"></span>
                      Users
                  </a>
              </li>
          </ul>
      </div>
  </nav>

  {{-- || Request::is('dashboard/posts') --}}
