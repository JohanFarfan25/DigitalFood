<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
      <span class="ms-0 font-weight-bold">
        <svg width="180" height="70" viewBox="0 0 250 100" xmlns="http://www.w3.org/2000/svg">
          <text x="10" y="40" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#0dcaf0">
            Digital
          </text>
          <text x="110" y="40" font-family="Arial, sans-serif" font-size="32" font-weight="bold" fill="#d63384">
            Food
          </text>
          <text x="10" y="70" font-family="Arial, sans-serif" font-size="16" fill="#555">
            Optimize, control and grow
          </text>
          <circle cx="100" cy="30" r="5" fill="#596cff" />
          <rect x="102" y="25" width="6" height="10" fill="#596cff" />
          <circle cx="180" cy="30" r="15" fill="none" stroke="#00cc66" stroke-width="3" />
          <line x1="172" y1="22" x2="188" y2="38" stroke="#00cc66" stroke-width="3" />
          <line x1="188" y1="22" x2="172" y2="38" stroke="#00cc66" stroke-width="3" />
        </svg>
      </span>
    </a>
  </div>
  <span class="ms-4 font-weight-bold" style="font-size: 80%;">{{ auth()->user()->name }}</span>
  <hr class="horizontal dark mt-3">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>shop </title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(0.000000, 148.000000)">
                      <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                      <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Users Management</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('user-profile') ? 'active' : '') }} " href="{{ url('user-profile') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="800px" height="800px" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#000000" fill-rule="nonzero">
                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                  <g id="customer-support" transform="translate(1.000000, 0.000000)">
                    <path d="M8 7C9.65685 7 11 5.65685 11 4C11 2.34315 9.65685 1 8 1C6.34315 1 5 2.34315 5 4C5 5.65685 6.34315 7 8 7Z" fill="#000000" />
                    <path d="M14 12C14 10.3431 12.6569 9 11 9H5C3.34315 9 2 10.3431 2 12V15H14V12Z" fill="#000000" />
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('user-management') ? 'active' : '') }}" href="{{ url('user-management') }}">
          <div class="icon icon-shape icon-sm shadow border: 1px border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg fill="#000000" width="800px" height="800px" viewBox="7 7 25 25" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#000000" fill-rule="nonzero">
                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                  <g id="customer-support" transform="translate(1.000000, 0.000000)">
                    <path class="clr-i-solid--badged clr-i-solid-path-1--badged" d="M12,16.14q-.43,0-.87,0a8.67,8.67,0,0,0-6.43,2.52l-.24.28v8.28H8.54v-4.7l.55-.62.25-.29a11,11,0,0,1,4.71-2.86A6.58,6.58,0,0,1,12,16.14Z"></path>
                    <path class="clr-i-solid--badged clr-i-solid-path-2--badged" d="M31.34,18.63a8.67,8.67,0,0,0-6.43-2.52,10.47,10.47,0,0,0-1.09.06,6.59,6.59,0,0,1-2,2.45,10.91,10.91,0,0,1,5,3l.25.28.54.62v4.71h3.94V18.91Z"></path>
                    <path class="clr-i-solid--badged clr-i-solid-path-3--badged" d="M11.1,14.19c.11,0,.2,0,.31,0a6.45,6.45,0,0,1,3.11-6.29,4.09,4.09,0,1,0-3.42,6.33Z"></path>
                    <circle class="clr-i-solid--badged clr-i-solid-path-4--badged" cx="17.87" cy="13.45" r="4.47"></circle>
                    <path class="clr-i-solid--badged clr-i-solid-path-5--badged" d="M18.11,20.3A9.69,9.69,0,0,0,11,23l-.25.28v6.33a1.57,1.57,0,0,0,1.6,1.54H23.84a1.57,1.57,0,0,0,1.6-1.54V23.3L25.2,23A9.58,9.58,0,0,0,18.11,20.3Z"></path>
                    <path class="clr-i-solid--badged clr-i-solid-path-6--badged" d="M24.43,13.44a6.54,6.54,0,0,1,0,.69,4.09,4.09,0,0,0,.58.05h.19a4.05,4.05,0,0,0,2.52-1,7.5,7.5,0,0,1-5.14-6.32A4.13,4.13,0,0,0,21.47,8,6.53,6.53,0,0,1,24.43,13.44Z"></path>
                    <circle class="clr-i-solid--badged clr-i-solid-path-7--badged clr-i-badge" cx="30" cy="6" r="5"></circle>
                    <rect x="0" y="0" width="36" height="36" fill-opacity="0" />
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Users</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('roles') ? 'active' : '') }}" href="{{ url('roles') }}">
          <div class="icon icon-shape icon-sm shadow border: 1px border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="20 15 60 60" enable-background="new 0 0 100 100">
              <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#000000" fill-rule="nonzero">
                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                  <g id="customer-support" transform="translate(1.000000, 0.000000)">
                    <path d="M44,63.3c0-3.4,1.1-7.2,2.9-10.2c2.1-3.7,4.5-5.2,6.4-8c3.1-4.6,3.7-11.2,1.7-16.2c-2-5.1-6.7-8.1-12.2-8&#10;&#9;s-10,3.5-11.7,8.6c-2,5.6-1.1,12.4,3.4,16.6c1.9,1.7,3.6,4.5,2.6,7.1c-0.9,2.5-3.9,3.6-6,4.6c-4.9,2.1-10.7,5.1-11.7,10.9&#10;&#9;c-1,4.7,2.2,9.6,7.4,9.6h21.2c1,0,1.6-1.2,1-2C45.8,72.7,44,68.1,44,63.3z M64,48.3c-8.2,0-15,6.7-15,15s6.7,15,15,15s15-6.7,15-15&#10;&#9;S72.3,48.3,64,48.3z M66.6,64.7c-0.4,0-0.9-0.1-1.2-0.2l-5.7,5.7c-0.4,0.4-0.9,0.5-1.2,0.5c-0.5,0-0.9-0.1-1.2-0.5&#10;&#9;c-0.6-0.6-0.6-1.7,0-2.5l5.7-5.7c-0.1-0.4-0.2-0.7-0.2-1.2c-0.2-2.6,1.9-5,4.5-5c0.4,0,0.9,0.1,1.2,0.2c0.2,0,0.2,0.2,0.1,0.4&#10;&#9;L66,58.9c-0.2,0.1-0.2,0.5,0,0.6l1.7,1.7c0.2,0.2,0.5,0.2,0.7,0l2.5-2.5c0.1-0.1,0.4-0.1,0.4,0.1c0.1,0.4,0.2,0.9,0.2,1.2&#10;&#9;C71.6,62.8,69.4,64.9,66.6,64.7z" fill="#121212" />
                  </g>
                </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Roles</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('permissions') ? 'active' : '') }}" href="{{ url('permissions') }}">
          <div class="icon icon-shape icon-sm shadow border: 1px border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="512px" height="512px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
              viewBox="0 0 512 512">
              <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#000000" fill-rule="nonzero">
                <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                  <g id="customer-support" transform="translate(1.000000, 0.000000)">
                    <path fill="black" fill-rule="nonzero" d="M423.51 61.53c-5.02,-5.03 -10.92,-7.51 -17.75,-7.51 -6.82,0 -12.8,2.48 -17.75,7.51l-27.05 26.97c-7.25,-4.7 -14.93,-8.8 -22.95,-12.47 -8.02,-3.67 -16.22,-6.82 -24.5,-9.55l0 -41.48c0,-7 -2.38,-12.89 -7.25,-17.75 -4.86,-4.86 -10.75,-7.25 -17.75,-7.25l-52.05 0c-6.66,0 -12.45,2.39 -17.49,7.25 -4.95,4.86 -7.43,10.75 -7.43,17.75l0 37.98c-8.7,2.04 -17.15,4.6 -25.26,7.76 -8.19,3.16 -15.95,6.74 -23.29,10.75l-29.96 -29.53c-4.69,-4.94 -10.4,-7.5 -17.32,-7.5 -6.83,0 -12.71,2.56 -17.75,7.5l-36.43 36.54c-5.03,5.03 -7.51,10.92 -7.51,17.73 0,6.83 2.48,12.81 7.51,17.75l26.97 27.06c-4.7,7.26 -8.79,14.93 -12.46,22.95 -3.68,8.02 -6.83,16.22 -9.56,24.49l-41.47 0c-7.01,0 -12.9,2.39 -17.76,7.26 -4.86,4.86 -7.25,10.75 -7.25,17.75l0 52.05c0,6.65 2.39,12.46 7.25,17.5 4.86,4.94 10.75,7.42 17.76,7.42l37.97 0c2.04,8.7 4.6,17.15 7.76,25.25 3.17,8.2 6.75,16.13 10.75,23.81l-29.52 29.44c-4.95,4.7 -7.51,10.41 -7.51,17.33 0,6.82 2.56,12.71 7.51,17.75l36.53 36.95c5.03,4.69 10.92,7 17.75,7 6.82,0 12.79,-2.31 17.75,-7l27.04 -27.48c7.26,4.69 14.94,8.78 22.96,12.46 8.02,3.66 16.21,6.83 24.49,9.55l0 41.48c0,7 2.39,12.88 7.25,17.74 4.86,4.87 10.76,7.26 17.75,7.26l52.05 0c6.66,0 12.46,-2.39 17.5,-7.26 4.94,-4.86 7.42,-10.74 7.42,-17.74l0 -37.98c8.7,-2.04 17.15,-4.6 25.25,-7.76 8.2,-3.16 16.14,-6.74 23.81,-10.75l29.44 29.53c4.7,4.95 10.49,7.5 17.51,7.5 7.07,0 12.87,-2.55 17.57,-7.5l36.95 -36.53c4.69,-5.04 7,-10.92 7,-17.75 0,-6.82 -2.31,-12.8 -7,-17.75l-27.48 -27.05c4.7,-7.26 8.79,-14.93 12.46,-22.96 3.66,-8.01 6.83,-16.21 9.56,-24.49l41.47 0c7,0 12.88,-2.4 17.74,-7.25 4.87,-4.87 7.26,-10.75 7.26,-17.75l0 -52.05c0,-6.66 -2.39,-12.45 -7.26,-17.5 -4.86,-4.95 -10.74,-7.42 -17.74,-7.42l-37.98 0c-2.04,-8.36 -4.6,-16.73 -7.76,-25 -3.16,-8.37 -6.74,-16.21 -10.75,-23.56l29.53 -29.95c4.95,-4.69 7.5,-10.41 7.5,-17.32 0,-6.83 -2.55,-12.71 -7.5,-17.75l-36.53 -36.43zm-48.41 257.98c-22.72,42.52 -67.54,71.44 -119.1,71.44 -51.58,0 -96.37,-28.92 -119.09,-71.42 2.66,-11.61 7.05,-21.74 19.9,-28.84 17.76,-9.89 48.34,-9.15 62.89,-22.24l20.1 52.78 10.1 -28.77 -4.95 -5.42c-3.72,-5.44 -2.44,-11.62 4.46,-12.74 2.33,-0.37 4.95,-0.14 7.47,-0.14 2.69,0 5.68,-0.25 8.22,0.32 6.41,1.41 7.07,7.62 3.88,12.56l-4.95 5.42 10.11 28.77 18.18 -52.78c13.12,11.8 48.43,14.18 62.88,22.24 12.89,7.22 17.26,17.24 19.9,28.82zm-159.11 -86.45c-1.82,0.03 -3.31,-0.2 -4.93,-1.1 -2.15,-1.19 -3.67,-3.24 -4.7,-5.55 -2.17,-4.86 -3.89,-17.63 1.57,-21.29l-1.02 -0.66 -0.11 -1.41c-0.21,-2.57 -0.26,-5.68 -0.32,-8.95 -0.2,-12 -0.45,-26.56 -10.37,-29.47l-4.25 -1.26 2.81 -3.38c8.01,-9.64 16.38,-18.07 24.82,-24.54 9.55,-7.33 19.26,-12.2 28.75,-13.61 9.77,-1.44 19.23,0.75 27.97,7.62 2.57,2.03 5.08,4.48 7.5,7.33 9.31,0.88 16.94,5.77 22.38,12.75 3.24,4.16 5.71,9.09 7.29,14.33 1.56,5.22 2.24,10.77 1.95,16.23 -0.53,9.8 -4.2,19.35 -11.61,26.33 1.3,0.04 2.53,0.33 3.61,0.91 4.14,2.15 4.27,6.82 3.19,10.75 -1.08,3.28 -2.44,7.08 -3.73,10.28 -1.56,4.31 -3.85,5.12 -8.27,4.65 -9.93,43.45 -69.98,44.93 -82.53,0.04zm40.01 -135.69c87.64,0 158.63,71.04 158.63,158.63 0,87.64 -71.04,158.63 -158.63,158.63 -87.63,0 -158.63,-71.04 -158.63,-158.63 0,-87.64 71.04,-158.63 158.63,-158.63z" />
                    />
                  </g>
                </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Permissions</span>
        </a>
      </li>
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Resource Management</h6>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('suppliers') ? 'active' : '') }}" href="{{ url('suppliers') }}">
          <div class="icon icon-shape icon-sm shadow border: 1px border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="800px" height="800px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Dribbble-Light-Preview" transform="translate(-60.000000, -6919.000000)" fill="#000000">
                  <g id="icons" transform="translate(56.000000, 160.000000)">
                    <path d="M15,6773 L12.621,6773 C12.176,6773 11.953,6772.461 12.268,6772.146 L15.293,6769.121 C15.683,6768.731 15.683,6768.098 15.293,6767.707 C14.902,6767.317 14.269,6767.317 13.879,6767.707 L10.854,6770.732 C10.539,6771.047 10,6770.824 10,6770.379 L10,6768 C10,6767.448 9.552,6767 9,6767 C8.448,6767 8,6767.448 8,6768 L8,6773 C8,6774.105 8.895,6775 10,6775 L15,6775 C15.552,6775 16,6774.552 16,6774 C16,6773.448 15.552,6773 15,6773 L15,6773 Z M22,6776 C22,6776.552 21.552,6777 21,6777 L7,6777 C6.448,6777 6,6776.552 6,6776 L6,6762 C6,6761.448 6.448,6761 7,6761 L15,6761 C15.552,6761 16,6761.448 16,6762 L16,6765 C16,6766.105 16.895,6767 18,6767 L21,6767 C21.552,6767 22,6767.448 22,6768 L22,6776 Z M22,6759 L6,6759 C4.895,6759 4,6759.895 4,6761 L4,6777 C4,6778.105 4.895,6779 6,6779 L22,6779 C23.105,6779 24,6778.105 24,6777 L24,6761 C24,6759.895 23.105,6759 22,6759 L22,6759 Z" id="arrow_corner-[#282]">
                    </path>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Suppliers</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('customers') ? 'active' : '') }}" href="{{ url('customers') }}">
          <div class="icon icon-shape icon-sm shadow border: 1px border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="800px" height="800px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Dribbble-Light-Preview" transform="translate(-60.000000, -6919.000000)" fill="#000000">
                  <g id="icons" transform="translate(56.000000, 160.000000)">
                    <path d="M15,6773 L12.621,6773 C12.176,6773 11.953,6772.461 12.268,6772.146 L15.293,6769.121 C15.683,6768.731 15.683,6768.098 15.293,6767.707 C14.902,6767.317 14.269,6767.317 13.879,6767.707 L10.854,6770.732 C10.539,6771.047 10,6770.824 10,6770.379 L10,6768 C10,6767.448 9.552,6767 9,6767 C8.448,6767 8,6767.448 8,6768 L8,6773 C8,6774.105 8.895,6775 10,6775 L15,6775 C15.552,6775 16,6774.552 16,6774 C16,6773.448 15.552,6773 15,6773 L15,6773 Z M22,6776 C22,6776.552 21.552,6777 21,6777 L7,6777 C6.448,6777 6,6776.552 6,6776 L6,6762 C6,6761.448 6.448,6761 7,6761 L15,6761 C15.552,6761 16,6761.448 16,6762 L16,6765 C16,6766.105 16.895,6767 18,6767 L21,6767 C21.552,6767 22,6767.448 22,6768 L22,6776 Z M22,6759 L6,6759 C4.895,6759 4,6759.895 4,6761 L4,6777 C4,6778.105 4.895,6779 6,6779 L22,6779 C23.105,6779 24,6778.105 24,6777 L24,6761 C24,6759.895 23.105,6759 22,6759 L22,6759 Z" id="arrow_corner-[#282]">
                    </path>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Customers</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('warehouses') ? 'active' : '') }}" href="{{ url('warehouses') }}">
          <div class="icon icon-shape icon-sm shadow border: 1px border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="800px" height="800px" viewBox="2 5 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 14.0014H17M7 14.0014V11.6014C7 11.0413 7 10.7613 7.10899 10.5474C7.20487 10.3592 7.35785 10.2062 7.54601 10.1104C7.75992 10.0014 8.03995 10.0014 8.6 10.0014H15.4C15.9601 10.0014 16.2401 10.0014 16.454 10.1104C16.6422 10.2062 16.7951 10.3592 16.891 10.5474C17 10.7613 17 11.0413 17 11.6014V14.0014M7 14.0014V18.0014V21.0014M17 14.0014V18.0014V21.0014M18.3466 6.17468L14.1466 4.07468C13.3595 3.68113 12.966 3.48436 12.5532 3.40691C12.1876 3.33832 11.8124 3.33832 11.4468 3.40691C11.034 3.48436 10.6405 3.68113 9.85338 4.07468L5.65337 6.17468C4.69019 6.65627 4.2086 6.89707 3.85675 7.25631C3.5456 7.574 3.30896 7.95688 3.16396 8.37725C3 8.85262 3 9.39106 3 10.4679V19.4014C3 19.9614 3 20.2414 3.10899 20.4554C3.20487 20.6435 3.35785 20.7965 3.54601 20.8924C3.75992 21.0014 4.03995 21.0014 4.6 21.0014H19.4C19.9601 21.0014 20.2401 21.0014 20.454 20.8924C20.6422 20.7965 20.7951 20.6435 20.891 20.4554C21 20.2414 21 19.9614 21 19.4014V10.4679C21 9.39106 21 8.85262 20.836 8.37725C20.691 7.95688 20.4544 7.574 20.1433 7.25631C19.7914 6.89707 19.3098 6.65627 18.3466 6.17468Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
          <span class="nav-link-text ms-1">Warehouses</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('products') ? 'active' : '') }}" href="{{ url('products') }}">
          <div class="icon icon-shape icon-sm shadow border: 1px border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="800px" height="800px" viewBox="2 5 20 20" xmlns="http://www.w3.org/2000/svg">
              <rect x="0" fill="none" width="24" height="24" />
              <g>
                <path d="M22 3H2v6h1v11c0 1.105.895 2 2 2h14c1.105 0 2-.895 2-2V9h1V3zM4 5h16v2H4V5zm15 15H5V9h14v11zm-2-9v6h-2v-2.59l-3.29 3.29-1.41-1.41L13.59 13H11v-2h6z" />
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Products</span>
        </a>
      </li>
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('batches') ? 'active' : '') }}" href="{{ url('batches') }}">
          <div class="icon icon-shape icon-sm shadow border: 1px border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="800px" height="800px" viewBox="15 15 50.00 50.00" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" fill="#000000" stroke="#000000">
              <g id="SVGRepo_bgCarrier" stroke-width="0" />
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
              <g id="SVGRepo_iconCarrier">
                <path d="m151.6 413.16c-2.4757 0-4.4662 1.9933-4.4662 4.469v30.552c0 2.4757 1.9905 4.469 4.4662 4.469h30.645c2.4757 0 4.469-1.9933 4.469-4.469v-30.552c0-2.4757-1.9933-4.469-4.469-4.469h-30.645zm0.36676 10.213h30.005v24.898h-30.005v-24.898zm36.765 1.6618v6.19c8.6064-0.1467 10.721 1.7568 10.445 9.5446l-4.3787 0.0198 8.5007 9.7166 8.0634-9.8436-4.8329-0.0198c-0.22153-10.476-0.24993-15.536-17.797-15.608zm-34.575 0.98464v4.833h24.989v-4.833h-24.989zm0 7.1352v4.8329h24.989v-4.8329h-24.989zm0 7.138v4.8329h24.989v-4.8329h-24.989zm36.861 12.767c-1.3234 0-2.3897 1.0663-2.3897 2.3897v16.33c0 1.3234 1.0663 2.3896 2.3897 2.3896h16.381c1.3234 0 2.3897-1.0662 2.3897-2.3896v-16.33c0-1.3234-1.0663-2.3897-2.3897-2.3897h-16.381zm19.848 3.3912v18.528h-18.525v2.5843h18.525 2.5843v-2.5843-18.528h-2.5843zm-19.653 2.068h16.039v13.311h-16.039v-13.311zm23.338 1.4135v18.528h-18.525v2.5843h18.525 2.5844v-2.5843-18.528h-2.5844zm-21.987 0.64043v2.5815h13.359v-2.5815h-13.359z" fill="#0000¡" transform="translate(-147.13 -413.16)" />
              </g>

            </svg>
          </div>
          <span class="nav-link-text ms-1">Batches</span>
        </a>
      </li>
    </ul>
  </div>
  <hr class="horizontal dark mt-3">
  <!-- <div class="sidenav-footer mx-2 ">
    <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
      <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpeg')"></div>
      <div class="card-body text-start p-3 w-100">
        <hr>
        <div class="docs-info p-2">
          <h6 class="text-white up mb-0" style="text-align: center;">Nesecitas ayuda?</h6>
          <div class="row mt-2" style="display: flex; justify-content: space-between;">
            <a href="https://wa.me/573227111889" target="_blank" class="btn btn-white btn-sm w-100 mb-3">
              <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Icon" style="width: 20px; margin-right: 8px;">
              Contactanos por WhatsApp
            </a>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</aside>