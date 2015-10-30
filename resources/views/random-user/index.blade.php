@extends('layouts.master')

@section('title')
    Random User Generator
@stop

{{--
This `head` section will be yielded right before the closing </head> tag. Use it
to add specific things that *this* View needs in the head, such as a page
specific styesheets.
--}}
@section('head')
    <link href='/css/random-user.css' rel='stylesheet'/>
@stop

@section('content')
    <h2>Random User Generator</h2>

    <form method='post' action='/random-user' data-transition='none'
        {{-- allow error and debug pages to open with jQuery libraries --}}
          {!! App::environment('local') ? 'data-ajax=\'false\'' : '' !!}>
        <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
        <fieldset>
            <label class='ui-slider-input' for='num_users'>
                Number of Users:
            </label>
            <input id='num_users'
                   type='range'
                   name='num_users'
                   value='{{ $_POST['num_users'] or 3 }}'
                   min='1'
                   max='50'
                   data-show-value='false'
                   data-popup-enabled='true'
                   data-highlight='true'/>
        </fieldset>
        <br/>
        <label>Data Options:</label>
        <fieldset data-role='controlgroup' data-type='horizontal'>
            <label for='address'>Address</label>
            <input id='address'
                   type='checkbox'
                   name='data_options[]'
                   value='address'
                   <?php if (isset($_POST['data_options']) &&
                         in_array('address', $_POST['data_options']))
                         echo 'checked'; ?>/>
            <label for='phoneNumber'>Phone Number</label>
            <input id='phoneNumber'
                   type='checkbox'
                   name='data_options[]'
                   value='phoneNumber'
                   <?php if (isset($_POST['data_options']) &&
                         in_array('phoneNumber', $_POST['data_options']))
                         echo 'checked'; ?>/>
            <label for='email'>E-mail</label>
            <input id='email'
                   type='checkbox'
                   name='data_options[]'
                   value='email'
                   {{-- select 'email' option by default --}}
                   <?php if (!isset($_POST['data_options']) ||
                         in_array('email', $_POST['data_options']))
                         echo 'checked'; ?>/>
            <label for='birthdate'>Birthdate</label>
            <input id='birthdate'
                   type='checkbox'
                   name='data_options[]'
                   value='birthdate'
                   <?php if (isset($_POST['data_options']) &&
                         in_array('birthdate', $_POST['data_options']))
                         echo 'checked'; ?>/>
            <label for='photo'>Photo</label>
            <input id='photo'
                   type='checkbox'
                   name='data_options[]'
                   value='photo'
                   {{-- select 'photo' option by default --}}
                   <?php if (!isset($_POST['data_options']) ||
                         in_array('photo', $_POST['data_options']))
                         echo 'checked'; ?>/>
        </fieldset>
        <br/>
        <fieldset>
            <label for='locale'>Language - Country:</label>
            <select name='locale' id='locale'>
                <option value='en_US'>English - United States</option>
                <option value='ar_JO' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ar_JO') echo 'selected'; ?>>Arabic - Jordan</option>
                <option value='hy_AM' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'hy_AM') echo 'selected'; ?>>Armenian - Armenia</option>
                <option value='bn_BD' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'bn_BD') echo 'selected'; ?>>Bengali - Bangladesh</option>
                <option value='zh_CN' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'zh_CN') echo 'selected'; ?>>Chinese - China</option>
                <option value='zh_TW' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'zh_TW') echo 'selected'; ?>>Chinese - Taiwan</option>
                <option value='cs_CZ' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'cs_CZ') echo 'selected'; ?>>Czech - Czech Republic</option>
                <option value='da_DK' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'da_DK') echo 'selected'; ?>>Danish - Denmark</option>
                <option value='nl_BE' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'nl_BE') echo 'selected'; ?>>Dutch - Belgium</option>
                <option value='nl_NL' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'nl_NL') echo 'selected'; ?>>Dutch - Netherlands</option>
                <option value='en_AU' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'en_AU') echo 'selected'; ?>>English - Australia</option>
                <option value='en_CA' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'en_CA') echo 'selected'; ?>>English - Canada</option>
                <option value='en_GB' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'en_GB') echo 'selected'; ?>>English - Great Britain</option>
                <option value='en_NZ' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'en_NZ') echo 'selected'; ?>>English - New Zealand</option>
                <option value='en_PH' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'en_PH') echo 'selected'; ?>>English - Phillippines</option>
                <option value='en_ZA' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'en_ZA') echo 'selected'; ?>>English - South Africa</option>
                <option value='en_UG' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'en_UG') echo 'selected'; ?>>English - Uganda</option>
                <option value='fi_FI' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'fi_FI') echo 'selected'; ?>>Finnish - Finland</option>
                <option value='fr_BE' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'fr_BE') echo 'selected'; ?>>French - Belgium</option>
                <option value='fr_CA' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'fr_CA') echo 'selected'; ?>>French - Canada</option>
                <option value='fr_FR' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'fr_FR') echo 'selected'; ?>>French - France</option>
                <option value='de_AT' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'de_AT') echo 'selected'; ?>>German - Austria</option>
                <option value='de_DE' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'de_DE') echo 'selected'; ?>>German - Germany</option>
                <option value='el_GR' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'el_GR') echo 'selected'; ?>>Greek - Greece</option>
                <option value='hu_HU' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'hu_HU') echo 'selected'; ?>>Hungarian - Hungary</option>
                <option value='is_IS' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'is_IS') echo 'selected'; ?>>Icelandic - Iceland</option>
                <option value='id_ID' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'id_ID') echo 'selected'; ?>>Indonesian - Indonesia</option>
                <option value='it_IT' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'it_IT') echo 'selected'; ?>>Italian - Italy</option>
                <option value='ja_JP' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ja_JP') echo 'selected'; ?>>Japanese - Japan</option>
                <option value='kk_KZ' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'kk_KZ') echo 'selected'; ?>>Kazakh - Kazakhstan</option>
                <option value='ko_KR' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ko_KR') echo 'selected'; ?>>Korean - Korea</option>
                <option value='lv_LV' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'lv_LV') echo 'selected'; ?>>Latvian - Latvia</option>
                <option value='me_ME' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'me_ME') echo 'selected'; ?>>Montenegrin - Montenegro</option>
                <option value='ne_NP' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ne_NP') echo 'selected'; ?>>Nepali - Nepal</option>
                <option value='no_NO' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'no_NO') echo 'selected'; ?>>Norwegian - Norway</option>
                <option value='pl_PL' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'pl_PL') echo 'selected'; ?>>Polish - Poland</option>
                <option value='pt_BR' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'pt_BR') echo 'selected'; ?>>Portuguese - Brazil</option>
                <option value='pt_PT' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'pt_PT') echo 'selected'; ?>>Portuguese - Portugal</option>
                <option value='ro_MD' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ro_MD') echo 'selected'; ?>>Romanian - Moldova</option>
                <option value='ro_RO' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ro_RO') echo 'selected'; ?>>Romanian - Romania</option>
                <option value='ru_RU' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'ru_RU') echo 'selected'; ?>>Russian - Russia</option>
                <option value='sr_RS' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'sr_RS') echo 'selected'; ?>>Serbian - Serbia</option>
                <option value='sk_SK' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'sk_SK') echo 'selected'; ?>>Slovak - Slovakia</option>
                <option value='sl_SI' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'sl_SI') echo 'selected'; ?>>Slovenian - Slovenia</option>
                <option value='es_AR' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'es_AR') echo 'selected'; ?>>Spanish - Argentina</option>
                <option value='es_PE' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'es_PE') echo 'selected'; ?>>Spanish - Peru</option>
                <option value='es_ES' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'es_ES') echo 'selected'; ?>>Spanish - Spain</option>
                <option value='es_VE' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'es_VE') echo 'selected'; ?>>Spanish - Venezuela</option>
                <option value='sv_SE' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'sv_SE') echo 'selected'; ?>>Swedish - Sweden</option>
                <option value='tr_TR' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'tr_TR') echo 'selected'; ?>>Turkish - Turkey</option>
                <option value='uk_UA' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'uk_UA') echo 'selected'; ?>>Ukrainian - Ukraine</option>
                <option value='vi_VN' <?php if (isset($_POST['locale']) && $_POST['locale'] == 'vi_VN') echo 'selected'; ?>>Vietnamese - Vietnam</option>
            </select>
        </fieldset>
        <br/>
        <br/>
        <input type='submit' value='Generate Users' data-inline='true'/>
    </form>
    <hr/>

    {{-- if there are errors, then print them out --}}
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- if the $users array is set, then print out the data for each user --}}
    @if (isset($users))
        <div class='random-user'>
            @foreach ($users as $user)
                <div class='user'>
                    @if (isset($user['photoUrl']))
                        <img src='{{ $user['photoUrl'] }}' alt='{{ $user['name'] }}'>
                    @endif

                    <div class='name'>{{ $user['name'] }}</div>

                    @if (isset($user['address']))
                        {{-- replace newline characters with '<br>' --}}
                        <div class='address'>{!! nl2br($user['address']) !!}</div>
                    @endif

                    @if (isset($user['phoneNumber']))
                        <div class='phoneNumber'>{{ $user['phoneNumber'] }}</div>
                    @endif

                    @if (isset($user['email']))
                        <div class='email'>{{ $user['email'] }}</div>
                    @endif

                    @if (isset($user['birthdate']))
                        <div class='birthdate'>{{ $user['birthdate'] }}</div>
                    @endif
                </div>
                <br/>
            @endforeach
        </div>
    @endif
@stop

{{--
This `body` section will be yielded right before the closing </body> tag. Use it
to add specific things that *this* View needs at the end of the body, such as a
page specific JavaScript files.
--}}
@section('body')
    {{-- <script src='/js/random-user.js'></script> --}}
@stop
