@extends('layouts.frontend')
@section('front')
    <!-- banner begin-->
    <div class="banner" style="background-image: url({{asset($all_static->home_backgorund_image)}})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="banner-content">
                        <h1>{{$all_static->home_title}}</h1>
                        <p>{!! $all_static->home_sub_title !!}</p>
                        <div class="content-button">
                            <a href="{{route('plans')}}">View Plans</a>
                            <a href="{{route('login')}}">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- how it works begin-->
    <div class="how-it-works">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h2>{{$all_static->home_how_it_title}}</h2>
                        <p>{!! $all_static->home_how_it_sub_title !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($how_data as $hdata)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-works">
                        <div class="part-icon">
                            <i class="{{$hdata->icon}}"></i>
                        </div>
                        <div class="part-text">
                            <h3>{{$hdata->title}}</h3>
                            <p>{!! $hdata->sub_title !!}</p>
                        </div>
                    </div>
                </div>
                    @endforeach




            </div>
        </div>
    </div>
    <!-- how it works end -->

    <!-- about begin-->
    <div class="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="about-content">
                        <div class="part-text">
                            <h3>About Company</h3>
                            <p>IDS Options is an investment platform, backed up by bonds, forex, cryptocurrency, stocks and binary options trading managed a group of experienced traders and market analysts. After years of professional trading we have joined our skills, knowledge and talents in the effort to bring a new reliable investment opportunity. We created a reliable long-term investment project that offers great returns, professionally managed, by a combination of shrewd investment strategy and well-diversified investments, to ensure portfolio stability and fund security. Our mission is to provide our investors with great opportunities for their funds by investing as prudently as possible in various areas.</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about begin -->

    <!-- feature begin-->
    <div class="feature">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h2>{{$all_static->home_our_feature_title}}</h2>
                        <p>{!! $all_static->home_our_feature_subtitle !!}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($f_data as $fata)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-feature">
                        <div class="part-icon">
                            <i class="{{$fata->icon}}"></i>
                        </div>
                        <div class="part-text">
                            <h3>{{$fata->title}}</h3>
                            <p>{!! $fata->sub_title	 !!}</p>
                        </div>
                    </div>
                </div>
                    @endforeach









            </div>
        </div>
    </div>
    <!-- feature end -->

    <!-- price begin-->
    <div class="price">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h2>Investment Plans</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 col-lg-12">

                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <div class="row">
                                @foreach($plans as $plan)
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-price">
                                        <div class="part-top">
                                            <h3>{{$plan->plan_name}}</h3>
                                            <h4>{{$plan->rep_per}}%<br /><span>Every Weak</span></h4>
                                        </div>
                                        <div class="part-bottom">
                                            <ul>
                                                <li>Features</li>
                                                <li>Minimum Deposit ${{$plan->min_am}}</li>
                                                <li>Miximum Deposit ${{$plan->max_am}}</li>
                                                <li>Enhanced security</li>
                                                <li>Access to all features</li>
                                                <li>24/7Support</li>
                                            </ul>
                                            <a href="{{route('all.plan')}}">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach




                            </div>
                        </div>
                        <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-price">
                                        <div class="part-top">
                                            <h3>Classic</h3>
                                            <h4>2%<br /><span>Daily for 75 Days</span></h4>
                                        </div>
                                        <div class="part-bottom">
                                            <ul>
                                                <li>Features</li>
                                                <li>Minimum Deposit $10</li>
                                                <li>Miximum Deposit $10,000</li>
                                                <li>Enhanced security</li>
                                                <li>Access to all features</li>
                                                <li>24/7Support</li>
                                            </ul>
                                            <a href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-price special">
                                        <div class="part-top">
                                            <h3>Premium</h3>
                                            <h4>5%<br /><span>Daily for 75 Days</span></h4>
                                        </div>
                                        <div class="part-bottom">
                                            <ul>
                                                <li>Features</li>
                                                <li>Minimum Deposit $10</li>
                                                <li>Miximum Deposit $10,000</li>
                                                <li>Enhanced security</li>
                                                <li>Access to all features</li>
                                                <li>24/7Support</li>
                                            </ul>
                                            <a href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-price">
                                        <div class="part-top">
                                            <h3>Professional</h3>
                                            <h4>7%<br /><span>Daily for 75 Days</span></h4>
                                        </div>
                                        <div class="part-bottom">
                                            <ul>
                                                <li>Features</li>
                                                <li>Minimum Deposit $10</li>
                                                <li>Miximum Deposit $10,000</li>
                                                <li>Enhanced security</li>
                                                <li>Access to all features</li>
                                                <li>24/7Support</li>
                                            </ul>
                                            <a href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- price end -->

    <!-- testimonial begin-->
    <div class="testimonial">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h2 class="add-space">What People Says</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="testimonial-slider">
                        @foreach($test as $ts)
                        <div class="single-testimonial">
                            <div class="testimonial-top">
                                <div class="part-icon">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div class="part-text">
                                    <p>{!! $ts->comment !!}</p>
                                </div>
                            </div>
                            <div class="part-details">
                                <div class="user-pic">
                                    <img src="{{asset($ts->image)}}" style="height: 120px;width: 100%" alt="">
                                </div>
                                <div class="user-data">
                                    <span class="name">{{$ts->name}}</span>
                                    <span class="profession">{{$ts->desg}}</span>
                                </div>
                            </div>
                        </div>
                            @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial end -->

    <!-- payment begin-->
    <div class="payment">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h2 class="add-space">Payment We Accept</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 text-center" style="margin: 0 auto" >
                    <div class="single-payment">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAXkAAACGCAMAAAAPbgp3AAAApVBMVEX///8Ra7YFq+gApucAqOcAqecApOYAZrQAXLAAY7MAYbIAX7EAZbQAaLUAYrJqwu6k2PTM6fnh8vva7/pllMj2+/53x++lv93P6vng6PMAWa/I1+obr+mZ1PPw+f0AV65/o8/U3+5Yve0/f7+vxeCMrNO+z+W44PZQiMOVs9fn7vYAUKyv3PWMz/G0yeJEt+tGg8BynMyf1vMoc7mdudoASKlXjMV/lv+5AAANMUlEQVR4nO2d6UKzOhCGWcIOXay0tftma1fUerz/SzszSYDQUovaip/N+0eWQOOTMJlMQlAUKSkpKSkpKSkpKSkpKSkpqYuoqvW0SdmZuElViWFI8mWoamhEki9DVZ3oUdmZuEltttttrexMSElJSUlJSUlJ/Yuad7nSQ93RaLQrL0c3osHapfL26bGWZ3mP5WXpRhTaKlUwTY+1HNWX5K+tPPKzjmuPSsvRreiY/DRQ57vZmO+ZBGQuSsrdX9Yx+b2lCud1DaTXS8jZX9cx+fepYHgk+aspz86LkuSvpcHQp3Il+R9WOHpkess/b+og2cKWoAXVoOxs/HnV24mkgflRUdvCZJadl9sS0RKRsvNyW5Lky5IkX5Yk+bIkyZclSb4sSfJlSZIvS5J8WdJJItmH/VE1BZWdl1vQW6vVeig7EzepteN0ZmVn4iZlq6oryZchIF85Jv/8RPXcKiFHt6K15w2PyTsBlbssIUe3p1q/34/flLLYpARfkv8JRcLbgZL8TyoyNEOSL0OS/I+rTtWOdNPs8UOS/I8onnTQSA+5FvVtPCS/WpWWs78ukwUozbv00D3XTnlx7c59eXn728ohn+o5UNWOrPUXU9i4Q7GdLPlBtzUStAdz78mQ2sW0MKnYTkp+Nnq218OObdu+xaVK8hdVXReGnhLyg/X9nKkbqIIk+cspJb8aKLpBpd8Nhslbgb4kfx3F5Ofeeq4YPSqDko/YlHlJ/kqKye9cV3j/OwTyEwLHF4pL/XlJ/pIaj6brpIXdVazRrBXrzUvIT59Re0n+cuoOrcBL9uYV1XIS+X5CnmnnSPIXkwompDKOtbREe47v3UfwKOjV/hbUV2aS/OU09KFqo8fuobLgkfwAOlg1PvVGkr+k/OXsbTl6uX+aqr5H+bsVB/tN2KD6oxVIWdDpZoYmyV9P4eph3N0lZeEM1+v1f9D+0ioP5CuS/MU0eFenT/cvo+XbbNcdP6zCg/PhaqzcbWr9bbM6UXa+68FjsZbkL6Cpr4JdsXzLdyou2BqM0eyxLB6hLOZ5ZTFYjQ8PSX1BHTVHtCz8pCy8gJdFK78spL4iO4/8qbJwkrKw9tN3Oe3pWypIPq8obDkq+x19lTzV5bKBoegbM2LfIW+du/kKusWFRg7DtesOb8xjuhr5sPWEvWJoF56XZ5nimkbeh2UU1gW1c4eI/zFdi/yj7cRB5cC3n8+wP0++ISyAASLNfx7+dciP/cxQihp0Pm6NC5DXtYyI2f/aP/xrdBXyM9ZLCCy34vqs6tsfvg4Rrs/1jBumaeBaXnQcQSewrW+/+j9fThuikcb5ZLm6Bvk5BW/Z0+Vuvnt8tmn9904kLq6qoel8JsqiRzTNbH/7lt9VjRj6LyK/ovf03uM6HI483B/npy4uIJ/OvpqQdL5teaoR7TeRn6J9scVV6HDAxZ1/MYeJMuRD/dQsuJ/U7yK/ozU8s/zfGA6JQ+vjeWvWPevod2etuWj7M+SVpqGRzSf/2YsL7Lz+1eL/JHkfx018n00tzie/hypvvWcOjYfQUYrr/MOL51Uc17X3ceksh55nW3RuzxDDQlPgvbq3Pdep2Gq6+H2WPFQ3wtrY+jYCsx8149HiTa2WWfJuAAca4WutVqMpwn5kaFGf9Zhxx4i22fUI681IM3rN+CYLuHJDU7SbEYHUPBNwyypmAk6/8iO1Cc1JoRX3PkXeDx5389nb8vHl/v15n99oPuAd7WyFXs12uxk/9NKJhxwDx2GlsaRNMPV+6JblKa0kVboSeJb8hpMf9EwCrg5OzdJYk9vTiSm8tX4H581NiKM7ZhWuM2lqQvBWr7ijGXBe4A43NDCJ2WO/NqGXDpQwilOzEh/AcfRvk+UJ+jwnxOwVWFryM+S90dnbKcqbA0yfTp0N98zR570sm1Z0Rt56gU023Gi9eOmv2rGZypJ/BfLo0mvQ1BId+lnw16Q2t2dkmoAqeqBIHmcsAh2KCgAaYLF0uBZpCn7SFrxXuJ+Z3m9CfdjFAIqD8NQbTh53jJj8Vsduho4ur6FdlHyxdzLvAapzMoCMpkgNXHe6tylk+j2HZcfFozgtv8MG4SFVUMFgtCqskpwlD86NvqA9LKO3gArZRm+nF6MmibMfmrDXW4QRzl/R26ZhTvqvVTy4qemaGfVrTdhJ/CQoGUPfNsKwMcFiQZu0nUBZkkUP6vKk38dL2QzUcNufAOQmzstQ8NmC+/fvQnB5jSLtbnHyjMBqdsZHQc/mpAf5grXbfcLT4YzOWeuMMbDWdTn58fiRmZnKdB4qqxEWT2y6MuTx/zRD7GERk5vViGhsc2AKC8OgVZrE12tg4uktNoAVLDyh6dvoJzH70ADwhP/INmlJsHgjMGG0bbgj6eLMfaGFxYZnw/NGCvQ1ipOvIPL50PXUD8O5iPNUIIC2AclnS0J8AIJ9nI2AvYrSSp8Fhb0oEfujIvkBPNBGFf/LSXXC61ddj0nx54EKWHMMTTTSBs98D01CTA37aIwlll5SXSENM+AYujD0OFzR53ZOoYWT1G7Y5tmD5yu6ZJ23Mc9of/3RRzd0PiD/YiWAaQ7RyHhoxsMD8tTmo3CeSWy78MOpiwaq3sRQgnnQjIGLTwuDVuLYfMCzYfD37JB8/HwgJ41wl4Q+F5s4dTW5IXrrND2ST7/ZCnukmdwlId8ngo0roE+QV3ilPbU8PROtsSdCMFhutsDrDYyPNVKOySdeE5ohn3uf1H7zUCXUQfPIdzMTPL3k8UCTwd9kbwqvmWIDnVokfFpoIrQY6W0RcZ9vCIZukJRwhjy1f83iwzvFydOKbIsVMleifTjQg3fg9gxsbm4OyAfJLxyST0KVupY+z3ebJnj06LDE5BdJ/UObwmlg3yv58CowNhLXMyEPP8HnsLOJ7Lxy02Y8+bkwnzx6SuDbNIv2aYuTd7FPMxv6Ff9DZ3VknbRHFGPmE0kWr98H5J1Z5hKBPF+hWp+kDvgC/W82FSs1CXGNbpsp4KbocqTtoSKQjwzmJTJBHyEhLxiSU+QVagMNvVfsu7qf8G1oW/iwPDPlYIfz0ILcU/NKipFpn08+fWYOyOvg7qGEW0Qm8NFJL5pMhA9oo5HBNlakjdtJpUlsOEokL9b5Xk+jwBOzQ3WSvNKOqB0kpMjXET7hz3/cssZCC8KejyMd13lsYl3lmHw3c0lK/jhGBs4I6bG+vUJS8uBYUpsumokj8onnl5BHpyjHUhclD+yrJm2DCjS1n+nDuvdF2o93NCFHIR1sJFbeQfNMDf+zUrzOH5FfpK0qEkkdEJZ4IdqUAuSbJPc7KsXJQ5lviehDndan4jaBfR/PMztt68fU/zmIH7TWeAH2o2zB73lE3wYfgi+Tx0oaZ6WuH7l+cDpd8bEA+YXY7qY6Sb4v3kXMVIGxg0/GKgPfceN5Zk6+NVfesTPlZ9CPPFrXR36m0rPgGpbEl8mj+xFvVwU7T002QT8zBVmAPIYacsK+J8nXiOAuZXJ1fonP78Tn/fxbhjTcZakxvrAVgAFyRny0yo+7Ug9YQhYtoY/Jpz2pI/JR6jS2TbG7oyzQHxF7pEXIo/kQ/EeFm+uT5NumkDx6TbauTf7UOOyYDYC76mg23y2fWGzMQtdoiU2qr+4AwMMj/WkWlKHkp7tZmEc+eNlRLzOPfDMxDw0agBQecjC32af+Y/KcLAYkNW6k6z2TlccR+dR7heQ8UrDVzSqrBHfmFaxNIfJKt8OiwJZTcS22yb8O9oSmPnDx3RQaGu4wJ4h+vS2g08yOyatBpYPbeeSx40iiRaPe1I0I3UqDCL15LTNs9SF5LCV6Qx0cS7O3rb02NdhkEYoj8tA/I/TMBuOcJi0rDA6bzUW7joGJAl/dus58mwfVyaQMOiN+5t3LHI69T5YN7CZnyY9ZcvcUeYzqaoTo+CZXiHHg1NdAm63pQtLT5BsmjbPT7TuNueQ4OhKPgWTJs+UJeNSI9p6oKxNGWGiEhjbMNPhzUteaY7b0XGGO2X3q0Lx58eSzwNsnh9/pq85oelqw5aVjto5PlzTCzYmp54x5b1gPVu8NwMXE/m3amzfE9hVKDq5PyL/CTur59cRvN22xHA2C4Xj+cw1I3M/cSE+ygl1oHqiuEXohZKbILKzrzWidvbP3De3nt0zoMnzbsxP3wpi4MpqC9pBwtoe/6ZnVPT1B//96vZ7XodhUJxM29Dmoi0k2JPuMZK6/gx3BM27jlcneYjuJJs1Nch4ndR7eSbjVolbjZ+vbKly4KBQ2u/Jc4m7uXOLwxPHLqmf8ghk5p3VV8qWqrafDI79Rue9J/QnykfG7vxWxD84T/tfI09ka1U8OEf24HthL32zy0t8gvyU6uPYkdhN/r8ZdPnnpabp37PQF/PNl8UvJm+hW47BV6dMuP6eDF/DFxRAOyiK44Btql9RdRCeFRf8Y+BwNeFk88rJg64K4lZx16n+JGrV+7atTfH+1QiiLbnd3Y+/ySUlJSUlJSUlJSUlJSUlJSUlJSUlJSUlJSUn9cv0PztcLk4RDqDAAAAAASUVORK5CYII=" style="height: 100px;width: 174px" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- payment end -->
@endsection
