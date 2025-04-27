<?php

locale_is_right_to_left('en'); // false
locale_is_right_to_left(''); // false
locale_is_right_to_left('ar'); // true
locale_is_right_to_left('ar-US'); // true
locale_is_right_to_left('he_IL'); // true
locale_is_right_to_left('ar-XY'); // true
?>