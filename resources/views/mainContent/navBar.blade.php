<li class="nav-item has-treeview">
    <router-link to="/" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Dashboard
        </p>
    </router-link>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Setup Table
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right">6</span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <router-link to="/country" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Country</p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/buyerInfo" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Buyer Info</p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/depotInfo" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Depot Info</p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/deliveryPoint" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Delivery Point</p>
            </router-link>
        </li>
        <li class="nav-item">
            <router-link to="/vehicleInfo" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Vehicle Info</p>
            </router-link>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Footer</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Collapsed Sidebar</p>
            </a>
        </li>
    </ul>
</li>
