@extends('layouts.frontend')
@section('front')
    <div class="hyip-breadcrump extra_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="breadcrump-title text-center">
                        <h2 class="add-space faq-title">Faq</h2>
                        <span>Home <i class="fas fa-chevron-right"></i> Faq</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="section-title">
                        <h2 class="add-space">Frequently Asked Question</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incint
                            ut labore et am, quis nostrud exercitation ullamco laboris nisi ut.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                Who are you ?
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            We are strong team of traders and have been working successfully together for almost 4 years.
                                            With IDS Options you can be certain that your investment will be handled by a group of qualified professionals. 
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Have you created a backup fund<br> in case your efforts fail ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Yes, we have reserve funds put aside from investment proceeds, which we continue to grow as our client base and investment funds grow. 
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Who can participate in this program ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Everyone can participate in this program. We accept members from any country in the world.
                                            You need an e-currency account.
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                                                Can I spend directly from e-currency site ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse4" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Yes, of course, or you can send it from your members area.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse5" aria-expanded="false" aria-controls="collapseOne">
                                                Are several deposits allowed ?
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse5" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            No, you can make as many deposits as you would like. However, each new deposit will be treated individually.
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse6" aria-expanded="false" aria-controls="collapseTwo">
                                                Are my payouts and referral bonuses paid <br>directly into my e-currency account ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse6" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Yes, you will receive payouts it into your e-currency account. 
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse7" aria-expanded="false" aria-controls="collapseThree">
                                                How will updates be provided ?
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse7" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            We will update all Members as soon as updates occur.
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapse8" aria-expanded="false" aria-controls="collapseThree">
                                                I'm still a little confused about your payment structure<br>... If I deposit $1,000 today, will I start<br> receiving $70 (or 7%) weekly? 
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse8" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            Yes, you will receive it in the next payday.
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
@endsection
