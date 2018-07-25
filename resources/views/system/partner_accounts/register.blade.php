@extends('layouts.partner.app') 

@section('css')
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@stop 

@section('body')

<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text"> KHBAR MDINTy</div>
        <h3>Créer un compte de partenaire</h3>
        <p>
            <small>
                Si vous avez un compte
                <a href="#">facebook.</a> ou un compte
                <a href="#">google.</a>, connectez-vous à ce processus.
            </small>
        </p>
        <div class="row">
            <div class="col-md-12">
                <div id="rootwizard" class="m-t-5">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                        <li class="nav-item">
                            <a class="pointer-e-n active" data-toggle="tab" href="#tab1" data-target="#tab1" role="tab">
                                <i class="fa fa-check tab-icon"></i>
                                <span> Agrément </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="pointer-e-n" data-toggle="tab" href="#tab2" data-target="#tab2" role="tab">
                                <i class="fa fa-building tab-icon"></i>
                                <span> Partenaire </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="pointer-e-n" data-toggle="tab" href="#tab3" data-target="#tab3" role="tab">
                                <i class="fa fa-user tab-icon"></i>
                                <span> Partenaire Account </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="pointer-e-n" data-toggle="tab" href="#tab4" data-target="#tab4" role="tab">
                                <i class="fa fa-cogs tab-icon"></i>
                                <span> Services </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="pointer-e-n" data-toggle="tab" href="#tab5" data-target="#tab5" role="tab">
                                <i class="fa fa-map-marker tab-icon"></i>
                                <span> Région </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="pointer-e-n" data-toggle="tab" href="#tab5" data-target="#tab6" role="tab">
                                <i class="fa fa-address-book tab-icon"></i>
                                <span> Résumé </span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane padding-20 sm-no-padding active slide-left" id="tab1">
                            <div class="row row-same-height">
                                <div class="col-md-12">
                                    <div class="card card-default">
                                        <div class="card-body">
                                            <div class="scrollable">
                                                <div class="demo-card-scrollable">
                                                    <h3>
                                                        <span class="semi-bold">With</span> Scroll
                                                    </h3>
                                                    <p>When it comes to digital design, the lines between functionality, aesthetics,
                                                        and psychology are inseparably blurred. Without the constraints of
                                                        the physical world, there’s no natural form to fall back on, and
                                                        every bit of constraint and affordance must be introduced intentionally.
                                                        Good design makes a product useful. A product is bought to be used.
                                                        It has to satisfy certain criteria, not only functional, but also
                                                        psychological and aesthetic. Good design emphasizes the usefulness
                                                        of a product whilst disregarding anything that could possibly detract
                                                        from it. It’s always obvious when design is an afterthought. The
                                                        hallmarks of the engineering-first approach are everywhere: inscrutable
                                                        interfaces, convoluted workflows, user guides the size of The Iliad.
                                                        This was the dominant approach for the first several decades of personal
                                                        computing, and it’s left its mark in the form of software designed
                                                        with its creators in mind, rather than its users.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkbox check-success  ">
                                        <input type="checkbox" value="1" id="agreement" name="agreement">
                                        <label for="agreement">J&apos;accepte</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab2">
                            <div class="row row-same-height">
                                <div class="col-md-12">
                                    <div class="padding-30 sm-padding-5">
                                        <p>Informations de base</p>
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default required">
                                                        <label for="company_name">Nom de la compagnie</label>
                                                        <input type="text" id="company_name" name="company_name" class="form-control">
                                                        <label class='error' for='company_name'></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-sm-8">
                                                    <div class="form-group form-group-default required">
                                                        <label for="about">À propos</label>
                                                        <textarea type="text" id="about" name="about" class="form-control"></textarea>
                                                        <label class='error' for='about'></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_partner" alt="" srcset="" width="250">
                                                        <label for="path_partner" class="choose_photo">
                                                            <span>
                                                                <i class="fa fa-image"></i> Choisir une photo</span>
                                                        </label>
                                                        <input type="file" id="path_partner" name="path_partner" class="form-control hide">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <br>
                                        <p> Adresse </p>
                                        <div class="form-group-attached">
                                            <div class="form-group form-group-default required">
                                                <label for="address">Adresse</label>
                                                <input type="text" id="address" name="address" class="form-control" placeholder="">
                                                <label class='error' for='address'></label>
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label for="address2">Deuxième ligne</label>
                                                <input type="text" id="address2" name="address2" class="form-control" placeholder="">
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="country">Pays</label>
                                                        <input type="text" id="country" name="country" class="form-control" placeholder="">
                                                        <label class='error' for='country'></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="city">Ville</label>
                                                        <input type="text" id="city" name="city" class="form-control">
                                                        <label class='error' for='city'></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-9">
                                                    <div class="form-group form-group-default required">
                                                        <label for="full_name">Nom complet</label>
                                                        <input type="text" id="full_name" name="full_name" class="form-control" placeholder="">
                                                        <label class='error' for='full_name'></label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group form-group-default">
                                                        <label for="zip_code">Code postal</label>
                                                        <input type="text" id="zip_code" name="zip_code" class="form-control">
                                                        <label class='error' for='zip_code'></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <br>
                                        <p>Téléphone</p>
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default input-group">
                                                        <div class="cs-input-group-addon input-group-addon d-flex">
                                                            <select class="cs-select cs-skin-slide cs-transparent" data-init-plugin="cs-select">
                                                                <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                                                <option data-countryCode="US" value="1">USA (+1)</option>
                                                                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                                                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                                                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                                                <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                                                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                                                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                                                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                                                <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                                                <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                                <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-input-group flex-1">
                                                            <label>Téléphone N1</label>
                                                            <input type="text" id="phone" name="phone[]" class="form-control">
                                                            <label class='error' for='phone'></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default input-group">
                                                        <div class="cs-input-group-addon input-group-addon d-flex">
                                                            <select class="cs-select cs-skin-slide cs-transparent" data-init-plugin="cs-select">
                                                                <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                                                <option data-countryCode="US" value="1">USA (+1)</option>
                                                                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                                                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                                                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                                                <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                                                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                                                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                                                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                                                <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                                                <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                                <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-input-group flex-1">
                                                            <label>Téléphone N2</label>
                                                            <input type="text" id="phone_two" name="phone[]" class="form-control">
                                                            <label class='error' for='phone_two'></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default input-group">
                                                        <div class="cs-input-group-addon input-group-addon d-flex">
                                                            <select class="cs-select cs-skin-slide cs-transparent" data-init-plugin="cs-select">
                                                                <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                                                                <option data-countryCode="US" value="1">USA (+1)</option>
                                                                <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                                                <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                                                <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                                                <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                                                <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                                                <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                                                <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                                                <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                                                <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                                                <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                                                <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                                                <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-input-group flex-1">
                                                            <label>Fax</label>
                                                            <input type="text" id="fax" name="fax" class="form-control">
                                                            <label class='error' for='fax'></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab3">
                            <div class="row row-same-height">
                                <div class="col-md-12">
                                    <div class="padding-30 sm-padding-5">
                                        <p>Partenaire Account</p>
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default required">
                                                                <label for="first_name">Prénom</label>
                                                                <input type="text" id="first_name" name="first_name" class="form-control">
                                                                <label class='error' for='first_name'></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default required">
                                                                <label for="last_name">Nom</label>
                                                                <input type="text" id="last_name" name="last_name" class="form-control">
                                                                <label class='error' for='last_name'></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default required">
                                                                <label for="profession">Profession</label>
                                                                <input type="text" id="profession" name="profession" class="form-control">
                                                                <label class='error' for='profession'></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default required">
                                                                <label for="email">Email</label>
                                                                <input type="text" id="email" name="email" class="form-control">
                                                                <label class='error' for='email'></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group-attached">
                                                                <div class="row clearfix">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group form-group-default required">
                                                                            <label for="password"> Mot de passe </label>
                                                                            <input type="password" id="password" name="password" class="form-control">
                                                                            <label class='error' for='password'></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group form-group-default required">
                                                                            <label for="password_confirmation">Confirmation mot de passe</label>
                                                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_partner_account" alt="" srcset=""width="250">
                                                        <label for="path_partner_account" class="choose_photo">
                                                            <span>
                                                                <i class="fa fa-image"></i> Choisir une photo</span>
                                                        </label>
                                                        <input type="file" id="path_partner_account" name="path_partner_account" class="form-control hide">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab4">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-condensed">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a>
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <span class="m-l-10 ">Dashboard UI Pack</span>
                                                </td>
                                                <td colspan="2">
                                                    <span class="m-l-10 font-montserrat fs-11 all-caps">Webarch UI Framework</span>
                                                    <a href="#" class="remove-item float-right">
                                                        <i class="pg-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a>
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    <span class="m-l-10 ">Profile</span>
                                                </td>
                                                <td colspan="2">
                                                    <span class="m-l-10 font-montserrat fs-11 all-caps">Webarch UI Framework</span>
                                                    <a href="#" class="remove-item float-right">
                                                        <i class="pg-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-lg-2 col-md-5 col-sm-2">
                                                    <div class="form-group form-group-default form-group-default-select2">
                                                        <label class="">Les sujets </label>
                                                        <select name="topic" class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
                                                            <option value="AK">Alaska</option>
                                                            <option value="HI">Hawaii</option>
                                                            <option value="CA">California</option>
                                                            <option value="NV">Nevada</option>
                                                            <option value="OR">Oregon</option>
                                                            <option value="WA">Washington</option>
                                                        </select>
                                                    </div>
                                                    <label for="topic" class="error"></label>
                                                </td>
                                                <td class="col-lg-2 col-md-5 col-sm-2">
                                                    <div class="form-group form-group-default form-group-default-select2">
                                                        <label class="">sous sujets</label>
                                                        <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2">
                                                            <option value="AK">Alaska</option>
                                                            <option value="HI">Hawaii</option>
                                                            <option value="CA">California</option>
                                                            <option value="NV">Nevada</option>
                                                            <option value="OR">Oregon</option>
                                                            <option value="WA">Washington</option>
                                                        </select>
                                                    </div>
                                                    <label for="topic" class="error"></label>
                                                </td>
                                                <td class="col-lg-2 col-md-2 col-sm-2 text-right">
                                                    <button class="btn btn-primary">
                                                        <i class="fa fa-plus"></i> Ajouter
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab5">
                            <h1>MAP.</h1>
                            <input type="hidden" name="long">
                            <input type="hidden" name="lat">
                        </div>
                        <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab6">
                            <h3>Partenaire Information</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Nom de la compagnie:</h5>
                                    <p>Nom de la compagnie </p>

                                    <h5 class="p-t-15">Ice:</h5>
                                    <p>Nom de la compagnie</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Registre du commerce:</h5>
                                    <p>Registre du commerce </p>

                                    <h5 class="p-t-15"> Taxe ID: </h5>
                                    <p>125 254 245 257 </p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('img/profiles/b2x.jpg') }}" alt="" srcset="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>À propos:</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas optio odio, magnam iste
                                        impedit deserunt eaque nostrum libero dicta ullam officia corrupti! Velit quia explicabo
                                        repellendus iusto praesentium neque adipisci?magnam iste impedit deserunt eaque nostrum
                                        libero dicta ullam Velit quia explicabo repellendus iusto praesentium neque adipisci?
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Adresse:</h5>
                                    <p>77 Rue de Verdun</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Pays:</h5>
                                    <p>France</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Ville:</h5>
                                    <p>MONTÉLIMAR</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Nom complet:</h5>
                                    <p>Ila A Courcelle</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Code postal:</h5>
                                    <p>26200</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Téléphone N1:</h5>
                                    <p>(+212) 04.33.00.97070 /p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Téléphone N2:</h5>
                                    <p>(+212) 04.33.00.97070</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Fax:</h5>
                                    <p>04.33.00.97070</p>
                                </div>
                            </div>
                            <hr>
                            <h3>Partenaire Account</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Nom:</h5>
                                    <p>Nom de la compagnie </p>

                                    <h5 class="p-t-15">Prénom</h5>
                                    <p>Nom de la compagnie</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Email:</h5>
                                    <p>rachiddaim1@gmial.com</p>

                                    <h5 class="p-t-15">Profession:</h5>
                                    <p>Administrateur</p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('img/profiles/b2x.jpg') }}" alt="" srcset="">
                                </div>
                            </div>
                        </div>
                        <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                            <ul class="pager wizard no-style">
                                <li class="next">
                                    <button class="btn btn-primary btn-cons btn-animated from-left fa fa-truck pull-right" type="button">
                                        <span>Suivant</span>
                                    </button>
                                </li>
                                <li class="next finish hidden">
                                    <button class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                                        <span>Terminer</span>
                                    </button>
                                </li>
                                <li class="previous first hidden">
                                    <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                                        <span>Premier</span>
                                    </button>
                                </li>
                                <li class="previous">
                                    <button class="btn btn-default btn-cons pull-right" type="button">
                                        <span>Précédent</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@stop 

@section('script')
<script src="{{ asset('plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
<script src="{{ asset('js/form_wizard.js') }} " type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#path_partner").on("change", function () {
            var _this = this;
            var image_preview = $("#image_preview_partner");
            showImage(_this, image_preview);
        });

        $("#path_partner_account").on("change", function () {
            var _this = this;
            var image_preview = $("#image_preview_partner_account");
            showImage(_this, image_preview);
        });

        function showImage(_this, image_preview) {
            var files = !!_this.files ? _this.files : [];
            if (!files.length || !window.FileReader) return;

            if (/^image/.test(files[0].type)) {  
                var ReaderObj = new FileReader();
                ReaderObj.readAsDataURL(files[0]);
                ReaderObj.onloadend = function () {
                    image_preview.attr('src', this.result);
                }
            } else {
                alert("Upload an image");
            }
        }


    });

</script>
@stop
