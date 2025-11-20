<?php
return [
    // Minutes to offset displayed message timestamps. Set MESSAGE_DISPLAY_OFFSET_MINUTES=60 in .env if you
    // intentionally want them to appear one hour later than creation. Default 0 (immediate display).
    'display_offset_minutes' => (int) env('MESSAGE_DISPLAY_OFFSET_MINUTES', 0),
];
