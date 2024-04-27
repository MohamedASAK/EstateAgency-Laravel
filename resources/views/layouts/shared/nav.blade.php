<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">EstateAgency</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admins
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('admin.index')}}">List</a></li>
              <li><a class="dropdown-item" href="{{route('admin.create')}}">Create</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Agents
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('agent.index')}}">List</a></li>
              <li><a class="dropdown-item" href="{{route('agent.create')}}">Create</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Developers
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('developer.index')}}">List</a></li>
              <li><a class="dropdown-item" href="{{route('developer.create')}}">Create</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Messageses
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('message.index')}}">List</a></li>
              <li><a class="dropdown-item" href="{{route('message.create')}}">Create</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Orders
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('order.index')}}">List</a></li>
              <li><a class="dropdown-item" href="{{route('order.create')}}">Create</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Propertites
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('property.index')}}">List</a></li>
              <li><a class="dropdown-item" href="{{route('property.create')}}">Create</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Users
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('user.index')}}">List</a></li>
              <li><a class="dropdown-item" href="{{route('user.create')}}">Create</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
