
                                <!-- footer @s -->
                                <div class="nk-footer" style="bottom: 0;position: fixed;">
                                    <div class="container wide-xl">
                                        <div class="nk-footer-wrap g-2">
                                            <div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="#">Softnio</a>
                                            </div>
                                            <div class="nk-footer-links">
                                                <ul class="nav nav-sm">
                                                    <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer @e -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->


    <script src="{{asset('js/jquery.min.js')}}"></script>
    
    
 <script>
   $('.dark-switch').on('click', function (e) {
    $.ajax(
    {
        url: "{{url('dark_mode') }}",
        type: 'get',
      });
   });
   </script>
    <!-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> -->
    <script src="{{asset('js/bundle.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>

    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
     @yield('footer')
    
</body>

</html>