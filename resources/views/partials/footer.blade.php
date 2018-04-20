<footer @if(Route::getCurrentRoute()->getName() !== 'home') class="white container mt-5" @endif>
    @if(Route::getCurrentRoute()->getName() == 'home')
        <div class="text-center p-b-50">
            <p>If you have any questions, please don’t hesitate to contact us:</p>
            <a href="" class="btn btn-default btn_yellow inline-block">{{ trans('messages.contact_us') }}</a>
        </div>
    @endif

    <div class="clear"></div>
    <div class="text-center m-t-50 p-t-50">

        <img src="/img/logo_nutrada_intercom.png" class="w-25 m-4 footer-logo" style="width:15%;"/>
    </div>

    <div class="row m-b-25">
        <div class="col-md-12 text-center footer-links">
            <a href="https://nutrada.com" target="_blank">Nutrada</a>
            @if(!Auth::check())
                <a href="/login" target="_blank">{{ trans('messages.login') }}</a>
            @endif
            <a href="http://help.nutrada.com/" target="_blank">{{ trans('messages.help_and_support') }}</a>
            <a data-toggle="tooltip" title="{{ trans('messages.coming_soon') }}" href=""
               target="_blank">{{ trans('messages.terms_and_conditions') }}</a>
            <a data-toggle="tooltip" title="{{ trans('messages.coming_soon') }}" href=""
               target="_blank">{{ trans('messages.privacy') }}</a>

        </div>
    </div>

</footer>

