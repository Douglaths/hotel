<?php
//esto no es obligatorio pero por un tema de seguridad que nos dice si BASEPATH no esta definido no va a cargar
if (!defined('BASEPATH')){exit('No direct script access allowed');}

if (!function_exists('menus')) {

    function menus($tipo_usuario) {
        $cadena = '
        <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="'.base_url('home/index').'">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-h-square"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hoteleria</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="'.base_url('home/index').'">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administración del Hotel
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="'.base_url('habitaciones/index').'">
                    <i class="fa fa-users"></i>
                    <span>Habitaciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="'.base_url('clientes/index').'">
                    <i class="fa fa-users"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="'.base_url('inventarios/index').'">
                    <i class="fa fa-archive"></i>
                    <span>Inventario</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ajustes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="'.base_url('ajustes/index').'">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Ajustes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="'.base_url('informacion/index').'">
                    <i class="fa fa-info-circle"></i>
                    <span>Informacion</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>';
        echo $cadena;
    }

}