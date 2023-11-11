<?php

add_role( 'developper', 'Développeur', get_role( 'administrator' )->capabilities );

remove_role( 'subscriber' );
remove_role( 'editor' );
remove_role( 'contributor' );
remove_role( 'author' );