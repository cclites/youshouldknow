{{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/jquery_ui.js') }}
        {{ HTML::script('js/knockout.js') }}
        {{ HTML::script('js/ko_mapping.js') }}
        
        {{ HTML::script('js/less.js') }}
        {{ HTML::script('js/custom_tags.js') }}
        
        @if(isset($result))
          {{ HTML::script('js/view_controller.js') }}
          {{ HTML::script('js/model.js') }}
        @elseif( $isAdmin )
          {{ HTML::script('js/admin_controller.js') }}
        @endif
        