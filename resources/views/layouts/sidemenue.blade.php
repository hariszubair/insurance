
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">
                            <div class="nk-aside" data-content="sideNav" data-toggle-overlay="true" data-toggle-screen="lg" data-toggle-body="true">
                                <div class="nk-sidebar-menu" data-simplebar>
                                    <ul class="nk-menu nk-menu-main">
                                        <li class="nk-menu-item">
                                            <a href="html/index.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Overview</span>
                                            </a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-text">Apps</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="html/apps-messages.html" class="nk-menu-link"><span class="nk-menu-text">Messages</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/apps-inbox.html" class="nk-menu-link"><span class="nk-menu-text">Inbox / Mail</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/apps-file-manager.html" class="nk-menu-link"><span class="nk-menu-text">File Manager</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/apps-chats.html" class="nk-menu-link"><span class="nk-menu-text">Chats / Messenger</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/apps-calendar.html" class="nk-menu-link"><span class="nk-menu-text">Calendar</span><span class="nk-menu-badge badge-warning">New</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="html/apps-kanban.html" class="nk-menu-link"><span class="nk-menu-text">Kanban Board</span><span class="nk-menu-badge badge-warning">New</span></a>
                                                </li>
                                            </ul><!-- .nk-menu-sub -->
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/components.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Components</span>
                                            </a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/support-kb.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Support</span>
                                            </a>
                                        </li><!-- .nk-menu-item -->
                                        <li class="nk-menu-item">
                                            <a href="html/pages/contact.html" class="nk-menu-link">
                                                <span class="nk-menu-text">Contact</span>
                                            </a>
                                        </li><!-- .nk-menu-item -->
                                    </ul><!-- .nk-menu -->
                                    <ul class="nk-menu">
                                       
                                      
                                        <li class="nk-menu-item">
                                            <a href="{{URL('home')}}" class="nk-menu-link">
                                                <span class="nk-menu-icon"><i class="fas fa-home fa-lg"></i></span>
                                                <span class="nk-menu-text">Dashboard</span>
                                            </a>
                                        </li>
                                        @hasrole('Company')
                                        @can('Auto')
                                        <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-text">Auto Insurance</span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a href="{{URL('vendor/auto/pending_quote')}}" class="nk-menu-link"><span class="nk-menu-text">Pending Quotes</span></a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="{{URL('vendor/auto/submitted_quote')}}" class="nk-menu-link"><span class="nk-menu-text">Submitted Quotes</span></a>
                                            </li>
                                        </ul><!-- .nk-menu-sub -->
                                    </li>
                                        @endcan
                                        @endhasrole<!-- .nk-menu-item -->
                    @if(\Auth::user()->isAdmin())
                                       <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                                <span class="nk-menu-icon"><i class="fas fa-fingerprint fa-lg"></i></span>
                                                <span class="nk-menu-text">Authorization</span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <li class="nk-menu-item">
                                                    <a href="{{Route('permissions')}}" class="nk-menu-link"><span class="nk-menu-text">Permissions</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="{{Route('roles')}}" class="nk-menu-link"><span class="nk-menu-text">Roles</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="{{Route('user.roles')}}" class="nk-menu-link"><span class="nk-menu-text">Users->Roles</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="{{Route('role.permission')}}" class="nk-menu-link"><span class="nk-menu-text">Roles->Permissions</span></a>
                                                </li>
                                                <li class="nk-menu-item">
                                                    <a href="{{Route('users.permission')}}" class="nk-menu-link"><span class="nk-menu-text">Users->Permissions</span></a>
                                                </li>
                                            </ul><!-- .nk-menu-sub -->
                                        </li>
                                        @endif
                                         @if(\Auth::user()->hasAnyPermission(['add user','edit user','delete user']))
                                        <li class="nk-menu-item">
                                            <a href="{{URL('users')}}" class="nk-menu-link">
                                                <span class="nk-menu-icon"><i class="fas fa-users  fa-lg"></i></span>
                                                <span class="nk-menu-text">Users</span>
                                            </a>
                                        </li>
                                        @endif
                                         @hasrole('Individual')
                                        <li class="nk-menu-item">
                                            <a href="{{URL('auto_requests')}}" class="nk-menu-link">
                                                <span class="nk-menu-icon"><i class="fas fa-users  fa-lg"></i></span>
                                                <span class="nk-menu-text">Available Quotes</span>
                                            </a>
                                        </li>
                                        @endhasrole
                                    </ul><!-- .nk-menu -->
                                </div><!-- .nk-sidebar-menu -->
                                <div class="nk-aside-close">
                                    <a href="#" class="toggle" data-target="sideNav"><em class="icon ni ni-cross"></em></a>
                                </div><!-- .nk-aside-close -->
                            </div><!-- .nk-aside -->