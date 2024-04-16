<?php

use LottaFramework\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$customizer_items = apply_filters( 'kenta_admin_page_customizer_items', [
	[
		'label'    => __( 'Site Logo', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M30.656 8h-29.312v20.544c0 1.184 0.896 2.112 1.984 2.112h25.344c1.088 0 1.984-0.928 1.984-2.112v-20.544zM30.656 6.656v-1.856c0-1.184-0.896-2.144-1.984-2.144h-25.344c-1.088 0-1.984 0.96-1.984 2.144v1.856h29.312zM32 28.544c0 1.888-1.472 3.456-3.328 3.456h-25.344c-1.856 0-3.328-1.568-3.328-3.456v-23.744c0-1.92 1.472-3.456 3.328-3.456h25.344c1.856 0 3.328 1.536 3.328 3.456v23.744zM4 4.672c0 0.352-0.288 0.672-0.672 0.672s-0.672-0.32-0.672-0.672 0.32-0.672 0.672-0.672 0.672 0.288 0.672 0.672M6.656 4.672c0 0.352-0.288 0.672-0.64 0.672s-0.672-0.32-0.672-0.672 0.288-0.672 0.672-0.672 0.64 0.288 0.64 0.672M9.344 4.672c0 0.352-0.288 0.672-0.672 0.672s-0.672-0.32-0.672-0.672 0.288-0.672 0.672-0.672c0.384 0 0.672 0.288 0.672 0.672M5.728 17.408h0.352c0.192 0 0.384 0.192 0.384 0.416v3.296c0 0.224 0.192 0.384 0.416 0.384h0.96c0.224 0 0.416 0.192 0.416 0.416v0.32c0 0.224-0.16 0.384-0.416 0.384 0 0 0 0 0 0h-2.080c-0.224 0-0.416-0.16-0.416-0.384v-4.416c0-0.224 0.16-0.416 0.384-0.416zM13.184 20c0-0.512-0.16-0.928-0.448-1.248-0.32-0.288-0.736-0.448-1.248-0.448s-0.896 0.16-1.216 0.448c-0.32 0.32-0.48 0.736-0.48 1.248s0.16 0.928 0.48 1.248c0.32 0.288 0.704 0.448 1.216 0.448s0.928-0.16 1.248-0.448c0.32-0.32 0.448-0.736 0.448-1.248zM9.504 21.92c-0.544-0.512-0.832-1.152-0.832-1.92s0.288-1.408 0.832-1.92 1.216-0.736 2.016-0.736 1.472 0.256 2.016 0.736c0.544 0.512 0.8 1.152 0.8 1.92s-0.256 1.408-0.8 1.92c-0.544 0.48-1.216 0.736-2.016 0.736s-1.472-0.256-2.016-0.736zM14.912 20c0-0.768 0.288-1.408 0.832-1.92 0.544-0.48 1.216-0.736 2.016-0.736 0.576 0 1.12 0.128 1.6 0.416 0.448 0.288 0.8 0.736 0.896 1.12 0.032 0.256-0.256 0.32-0.704 0.32-0.128 0-0.256-0.096-0.352-0.224-0.256-0.448-0.864-0.704-1.472-0.704-0.512 0-0.896 0.16-1.216 0.48-0.32 0.288-0.48 0.704-0.48 1.248 0 0.512 0.16 0.928 0.48 1.216 0.32 0.32 0.704 0.48 1.152 0.48s0.8-0.128 1.088-0.32c0.288-0.192 0.384-0.384 0.448-0.64h-1.44c-0.192 0-0.384-0.16-0.384-0.384 0 0 0-0.032 0-0.032v-0.224c0.032-0.192 0.192-0.384 0.416-0.384l2.208 0.032c0.224 0 0.384 0.16 0.384 0.416v0.32c-0.096 0.576-0.32 1.088-0.832 1.504-0.512 0.448-1.12 0.64-1.888 0.64s-1.408-0.224-1.952-0.736c-0.544-0.48-0.8-1.12-0.8-1.888zM25.536 20c0-0.512-0.16-0.928-0.48-1.248-0.32-0.288-0.736-0.448-1.216-0.448-0.512 0-0.928 0.16-1.248 0.448-0.32 0.32-0.448 0.736-0.448 1.248s0.16 0.928 0.448 1.248c0.32 0.288 0.736 0.448 1.248 0.448 0.48 0 0.896-0.16 1.216-0.448 0.32-0.32 0.48-0.736 0.48-1.248zM21.824 21.92c-0.544-0.512-0.8-1.152-0.8-1.92s0.256-1.408 0.832-1.92 1.184-0.736 1.984-0.736c0.8 0 1.472 0.256 2.016 0.736 0.544 0.512 0.832 1.152 0.832 1.92s-0.288 1.408-0.832 1.92c-0.544 0.48-1.216 0.736-2.016 0.736s-1.472-0.256-2.016-0.736zM27.328 25.344h-22.656c-0.384 0-0.672-0.32-0.672-0.672s0.288-0.672 0.672-0.672h22.656c0.384 0 0.672 0.288 0.672 0.672s-0.288 0.672-0.672 0.672zM27.328 16h-22.656c-0.384 0-0.672-0.288-0.672-0.672s0.288-0.672 0.672-0.672h22.656c0.384 0 0.672 0.288 0.672 0.672s-0.288 0.672-0.672 0.672z"></path></svg>',
		'location' => 'kenta_header:logo',
	],
	[
		'label'    => __( 'Colors Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 255.1C512 256.9 511.1 257.8 511.1 258.7C511.6 295.2 478.4 319.1 441.9 319.1H344C317.5 319.1 296 341.5 296 368C296 371.4 296.4 374.7 297 377.9C299.2 388.1 303.5 397.1 307.9 407.8C313.9 421.6 320 435.3 320 449.8C320 481.7 298.4 510.5 266.6 511.8C263.1 511.9 259.5 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256V255.1zM96 255.1C78.33 255.1 64 270.3 64 287.1C64 305.7 78.33 319.1 96 319.1C113.7 319.1 128 305.7 128 287.1C128 270.3 113.7 255.1 96 255.1zM128 191.1C145.7 191.1 160 177.7 160 159.1C160 142.3 145.7 127.1 128 127.1C110.3 127.1 96 142.3 96 159.1C96 177.7 110.3 191.1 128 191.1zM256 63.1C238.3 63.1 224 78.33 224 95.1C224 113.7 238.3 127.1 256 127.1C273.7 127.1 288 113.7 288 95.1C288 78.33 273.7 63.1 256 63.1zM384 191.1C401.7 191.1 416 177.7 416 159.1C416 142.3 401.7 127.1 384 127.1C366.3 127.1 352 142.3 352 159.1C352 177.7 366.3 191.1 384 191.1z"/></svg>',
		'location' => 'kenta_colors',
	],
	[
		'label'    => __( 'Typography Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 416h-25.81L253.1 52.76c-4.688-12.47-16.57-20.76-29.91-20.76s-25.34 8.289-30.02 20.76L57.81 416H32c-17.67 0-32 14.31-32 32s14.33 32 32 32h96c17.67 0 32-14.31 32-32s-14.33-32-32-32H126.2l17.1-48h159.6l17.1 48H320c-17.67 0-32 14.31-32 32s14.33 32 32 32h96c17.67 0 32-14.31 32-32S433.7 416 416 416zM168.2 304L224 155.1l55.82 148.9H168.2z"/></svg>',
		'location' => 'kenta_content:kenta_content_typography',
	],
	[
		'label'    => __( 'Menu Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M30.656 5.344h-29.312c-0.384 0-0.672 0.288-0.672 0.64v4c0 0.384 0.288 0.672 0.672 0.672h8.672v15.328c0 0.384 0.288 0.672 0.64 0.672h13.344c0.384 0 0.672-0.288 0.672-0.672v-15.328h5.984c0.384 0 0.672-0.288 0.672-0.672v-4c0-0.352-0.288-0.64-0.672-0.64zM20.672 9.344h-9.344v-2.688h9.344v2.688zM2.016 6.656h8v2.688h-8v-2.688zM23.328 25.344h-12v-14.688h12v14.688zM30.016 9.344h-8v-2.688h8v2.688zM13.344 13.344c-0.384 0-0.672 0.288-0.672 0.64s0.288 0.672 0.672 0.672h8c0.352 0 0.672-0.288 0.672-0.672s-0.32-0.64-0.672-0.64h-8zM21.344 17.344h-8c-0.384 0-0.672 0.288-0.672 0.64s0.288 0.672 0.672 0.672h8c0.352 0 0.672-0.288 0.672-0.672s-0.32-0.64-0.672-0.64zM21.344 21.344h-8c-0.384 0-0.672 0.288-0.672 0.64s0.288 0.672 0.672 0.672h8c0.352 0 0.672-0.288 0.672-0.672s-0.32-0.64-0.672-0.64z"></path></svg>',
		'location' => 'kenta_header',
	],
	[
		'label'    => __( 'Header Builder', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M28.672 1.984c1.728 0 3.2 1.216 3.328 2.816v22.272c0 1.6-1.344 2.944-3.072 2.944h-25.6c-1.728 0-3.2-1.216-3.328-2.816v-22.272c0-1.6 1.344-2.944 3.072-2.944h25.6zM30.656 8.672h-29.312v18.4c0 0.8 0.8 1.6 1.856 1.6h25.472c1.056 0 1.856-0.672 1.984-1.472v-18.528zM28.672 3.328h-25.344c-1.056 0-1.856 0.672-1.984 1.472v2.528h29.312v-2.4c0-0.8-0.8-1.6-1.856-1.6h-0.128z"></path></svg>',
		'location' => 'kenta_header',
	],
	[
		'label'    => __( 'Footer Builder', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M28.672 1.984c1.856 0 3.328 1.344 3.328 2.944v22.016c0 1.728-1.472 2.912-3.328 2.912h-25.344c-1.856 0-3.328-1.312-3.328-2.912v-22.016c0-1.728 1.472-2.944 3.328-2.944h25.344zM30.656 23.328h-29.312v3.744c0 0.928 0.928 1.6 1.984 1.6h25.344c1.056 0 1.984-0.8 1.984-1.6v-3.744zM28.672 3.328h-25.344c-1.056 0-1.984 0.8-1.984 1.6v17.056h29.312v-17.056c0-0.8-0.928-1.6-1.984-1.6z"></path></svg>',
		'location' => 'kenta_footer',
	],
	[
		'label'    => __( 'Content Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M28.672 1.344c1.76 0 3.2 1.312 3.328 2.976v24.448c0 1.728-1.376 3.104-3.104 3.232h-25.568c-1.76 0-3.2-1.312-3.328-3.008v-24.448c0-1.696 1.376-3.104 3.136-3.2h25.536zM30.656 8h-29.312v20.8c0 0.96 0.768 1.76 1.792 1.856h25.536c1.024 0 1.888-0.736 1.984-1.696v-20.96zM20 28.544c-0.16 0-0.288-0.064-0.416-0.16l-0.128-0.128-0.032 0.064c-0.064 0.096-0.16 0.16-0.256 0.16l-0.128 0.032-0.096 0.032h-2.688c-0.32 0-0.576-0.256-0.64-0.544v-5.472c0-1.472 1.12-2.688 2.592-2.784h2.080l-0.416-2.56c0-1.12 0.8-2.048 1.888-2.24h0.16l0.224-0.032c1.184 0 2.144 0.928 2.24 2.176v0.192l-0.384 2.432h1.856c1.44 0 2.592 1.056 2.784 2.4l0.032 0.192v5.536c0 0.352-0.224 0.608-0.544 0.672l-0.128 0.032h-8zM27.328 24.256h-10.4v2.944h1.472l0.416-1.632c0.16-0.576 0.896-0.672 1.184-0.224l0.064 0.096 0.032 0.128 0.416 1.632h1.504v-1.472c0-0.384 0.288-0.672 0.64-0.672s0.608 0.256 0.672 0.544v1.6h1.344v-1.472c0-0.384 0.288-0.672 0.672-0.672 0.32 0 0.576 0.256 0.64 0.544l0.032 0.128v1.472h1.312v-2.944zM17.344 10.656c0.32 0 0.576 0.256 0.64 0.544l0.032 0.128v3.168c0 0.864-1.216 0.896-1.344 0.128l-0.032-0.224c-0.032-0.256-0.224-0.448-0.48-0.48l-0.096-0.032h-3.776v9.504c0 0.256 0.16 0.48 0.384 0.544l0.128 0.032 0.256 0.032c0.64 0.128 0.672 1.056 0.096 1.28l-0.096 0.032-0.16 0.032h-4.448l-0.128-0.032c-0.704-0.128-0.704-1.184 0-1.312h0.256c0.224-0.064 0.416-0.256 0.48-0.48v-9.6h-3.776c-0.256 0-0.48 0.16-0.544 0.384l-0.032 0.096-0.032 0.256c-0.128 0.704-1.184 0.704-1.312 0v-3.328c0-0.32 0.224-0.608 0.544-0.64l0.096-0.032h13.344zM16.672 12h-12v0.672l0.064-0.032 0.16-0.032 0.192-0.032h4.608c0.352 0 0.608 0.224 0.672 0.544v10.272c0 0.128 0 0.256-0.032 0.384l-0.032 0.16-0.032 0.064h0.768v-0.064l-0.064-0.16v-0.192l-0.032-0.192v-10.144c0-0.352 0.256-0.608 0.544-0.672h4.576c0.096 0 0.256 0 0.352 0.032l0.192 0.032 0.064 0.032v-0.672zM22.144 16.256c-0.48 0-0.864 0.352-0.928 0.704l-0.032 0.128 0.544 3.2c0.064 0.352-0.192 0.704-0.544 0.736l-0.128 0.032h-2.656c-0.768 0-1.376 0.576-1.44 1.312l-0.032 0.16v0.416h10.4v-0.416c0-0.704-0.48-1.28-1.152-1.408l-0.32-0.064h-2.656c-0.384 0-0.672-0.288-0.672-0.64l0.032-0.128 0.512-3.104c0-0.512-0.416-0.928-0.928-0.928zM28.672 2.656h-25.344c-1.024 0-1.888 0.768-1.984 1.728v2.272h29.312v-2.112c0-0.96-0.768-1.792-1.792-1.888h-0.192zM4 4.672c0 0.352-0.288 0.672-0.672 0.672s-0.672-0.32-0.672-0.672 0.32-0.672 0.672-0.672 0.672 0.288 0.672 0.672M6.656 4.672c0 0.352-0.288 0.672-0.64 0.672s-0.672-0.32-0.672-0.672 0.288-0.672 0.672-0.672 0.64 0.288 0.64 0.672M9.344 4.672c0 0.352-0.288 0.672-0.672 0.672s-0.672-0.32-0.672-0.672 0.288-0.672 0.672-0.672c0.384 0 0.672 0.288 0.672 0.672"></path></svg>',
		'location' => 'kenta_content',
	],
	[
		'label'    => __( 'Single Post Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M28.672 1.984c1.728 0 3.2 1.216 3.328 2.784v22.24c0 1.6-1.376 2.88-3.104 2.976l-0.224 0.032h-25.344c-1.728 0-3.2-1.216-3.328-2.784v-22.24c0-1.6 1.376-2.88 3.104-2.976l0.224-0.032h25.344zM28.672 3.328h-25.344c-1.056 0-1.888 0.672-1.984 1.504v22.176c0 0.832 0.768 1.568 1.792 1.632l0.192 0.032h25.344c1.056 0 1.888-0.672 1.984-1.504v-22.176c0-0.832-0.768-1.568-1.792-1.632l-0.192-0.032zM26.656 23.328c0.384 0 0.672 0.288 0.672 0.672 0 0.32-0.224 0.608-0.544 0.64l-0.128 0.032h-21.312c-0.384 0-0.672-0.288-0.672-0.672 0-0.32 0.224-0.608 0.544-0.64l0.128-0.032h21.312zM26.656 19.328c0.384 0 0.672 0.288 0.672 0.672 0 0.32-0.224 0.608-0.544 0.64l-0.128 0.032h-21.312c-0.384 0-0.672-0.288-0.672-0.672 0-0.32 0.224-0.608 0.544-0.64l0.128-0.032h21.312zM9.248 7.648l0.032 0.128 3.36 9.344c0.096 0.32-0.064 0.704-0.416 0.832-0.288 0.128-0.64-0.032-0.8-0.288l-0.064-0.096-0.8-2.24h-3.808l-0.8 2.24c-0.096 0.288-0.416 0.48-0.736 0.416h-0.096c-0.32-0.128-0.48-0.448-0.448-0.736l0.032-0.128 3.328-9.344c0.224-0.544 0.928-0.576 1.216-0.128zM26.656 15.328c0.384 0 0.672 0.288 0.672 0.672 0 0.32-0.224 0.608-0.544 0.64l-0.128 0.032h-10.656c-0.384 0-0.672-0.288-0.672-0.672 0-0.32 0.256-0.608 0.544-0.64l0.128-0.032h10.656zM8.672 9.984l-1.44 4h2.848l-1.408-4zM26.656 11.328c0.384 0 0.672 0.288 0.672 0.672 0 0.32-0.224 0.608-0.544 0.64l-0.128 0.032h-10.656c-0.384 0-0.672-0.288-0.672-0.672 0-0.32 0.256-0.608 0.544-0.64l0.128-0.032h10.656zM26.656 7.328c0.384 0 0.672 0.288 0.672 0.672 0 0.32-0.224 0.608-0.544 0.64l-0.128 0.032h-10.656c-0.384 0-0.672-0.288-0.672-0.672 0-0.32 0.256-0.608 0.544-0.64l0.128-0.032h10.656z"></path></svg>',
		'location' => 'kenta_single_post',
	],
	[
		'label'    => __( 'Page Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M28.672 1.984c1.728 0 3.2 1.216 3.328 2.784v22.24c0 1.6-1.376 2.88-3.104 2.976l-0.224 0.032h-25.344c-1.728 0-3.2-1.216-3.328-2.784v-22.24c0-1.6 1.376-2.88 3.104-2.976l0.224-0.032h25.344zM28.672 3.328h-25.344c-1.056 0-1.888 0.672-1.984 1.504v22.176c0 0.832 0.768 1.568 1.792 1.632l0.192 0.032h25.344c1.056 0 1.888-0.672 1.984-1.504v-22.176c0-0.832-0.768-1.568-1.792-1.632l-0.192-0.032zM15.552 20.672c0.256 0 0.448 0.192 0.448 0.448v5.76c0 0.256-0.192 0.448-0.448 0.448h-12.448c-0.224 0-0.448-0.192-0.448-0.448v-5.76c0-0.256 0.224-0.448 0.448-0.448h12.448zM28.672 25.984c0.384 0 0.672 0.32 0.672 0.672s-0.256 0.608-0.544 0.672h-10.784c-0.384 0-0.672-0.288-0.672-0.672 0-0.32 0.224-0.576 0.544-0.64l0.128-0.032h10.656zM14.656 21.984h-10.656v4h10.656v-4zM28.672 23.328c0.384 0 0.672 0.288 0.672 0.672 0 0.32-0.256 0.608-0.544 0.64l-0.128 0.032h-10.656c-0.384 0-0.672-0.288-0.672-0.672 0-0.32 0.224-0.608 0.544-0.64l0.128-0.032h10.656zM28.672 20.672c0.384 0 0.672 0.288 0.672 0.672 0 0.32-0.256 0.576-0.544 0.64h-10.784c-0.384 0-0.672-0.288-0.672-0.64s0.224-0.608 0.544-0.672h10.784zM28.896 4.672c0.224 0 0.448 0.192 0.448 0.448v13.76c0 0.256-0.224 0.448-0.448 0.448h-25.792c-0.224 0-0.448-0.192-0.448-0.448v-13.76c0-0.256 0.224-0.448 0.448-0.448h25.792zM20.64 10.304l-5.28 5.44c-0.192 0.16-0.448 0.256-0.704 0.16l-0.096-0.064-3.936-2.304-4.896 4.448h21.472l-6.56-7.68zM28 5.984h-24v11.776l6.080-5.536c0.192-0.16 0.448-0.224 0.672-0.128l0.128 0.064 3.904 2.272 5.44-5.568c0.224-0.256 0.608-0.256 0.896-0.064l0.096 0.096 6.784 7.968v-10.88zM8 7.328c1.12 0 2.016 0.896 2.016 2.016s-0.896 1.984-2.016 1.984-1.984-0.896-1.984-1.984 0.864-2.016 1.984-2.016zM8 8.672c-0.384 0-0.672 0.288-0.672 0.672s0.288 0.64 0.672 0.64 0.672-0.288 0.672-0.64-0.288-0.672-0.672-0.672z"></path></svg>',
		'location' => 'kenta_pages',
	],
	[
		'label'    => __( 'Archive Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path d="M9.344 2.656h-8c-0.384 0-0.672 0.32-0.672 0.672v8c0 0.384 0.288 0.672 0.672 0.672h8c0.352 0 0.672-0.288 0.672-0.672v-8c0-0.352-0.32-0.672-0.672-0.672zM8.672 10.656h-6.656v-6.656h6.656v6.656zM8 14.656c0.384 0 0.672-0.288 0.672-0.672s-0.288-0.64-0.672-0.64h-5.344c-0.352 0-0.64 0.288-0.64 0.64s0.288 0.672 0.64 0.672h5.344zM20 2.656h-8c-0.352 0-0.672 0.32-0.672 0.672v8c0 0.384 0.32 0.672 0.672 0.672h8c0.384 0 0.672-0.288 0.672-0.672v-8c0-0.352-0.288-0.672-0.672-0.672zM19.328 10.656h-6.656v-6.656h6.656v6.656zM18.656 14.656c0.384 0 0.672-0.288 0.672-0.672s-0.288-0.64-0.672-0.64h-5.312c-0.384 0-0.672 0.288-0.672 0.64s0.288 0.672 0.672 0.672h5.312zM30.656 2.656h-8c-0.352 0-0.64 0.32-0.64 0.672v8c0 0.384 0.288 0.672 0.64 0.672h8c0.384 0 0.672-0.288 0.672-0.672v-8c0-0.352-0.288-0.672-0.672-0.672zM30.016 10.656h-6.688v-6.656h6.688v6.656zM29.344 14.656c0.352 0 0.672-0.288 0.672-0.672s-0.32-0.64-0.672-0.64h-5.344c-0.352 0-0.672 0.288-0.672 0.64s0.32 0.672 0.672 0.672h5.344zM9.344 17.344h-8c-0.384 0-0.672 0.288-0.672 0.64v8c0 0.384 0.288 0.672 0.672 0.672h8c0.352 0 0.672-0.288 0.672-0.672v-8c0-0.352-0.32-0.64-0.672-0.64zM8.672 25.344h-6.656v-6.688h6.656v6.688zM8 28h-5.344c-0.352 0-0.64 0.288-0.64 0.672s0.288 0.672 0.64 0.672h5.344c0.384 0 0.672-0.32 0.672-0.672s-0.288-0.672-0.672-0.672zM20 17.344h-8c-0.352 0-0.672 0.288-0.672 0.64v8c0 0.384 0.32 0.672 0.672 0.672h8c0.384 0 0.672-0.288 0.672-0.672v-8c0-0.352-0.288-0.64-0.672-0.64zM19.328 25.344h-6.656v-6.688h6.656v6.688zM18.656 28h-5.312c-0.384 0-0.672 0.288-0.672 0.672s0.288 0.672 0.672 0.672h5.312c0.384 0 0.672-0.32 0.672-0.672s-0.288-0.672-0.672-0.672zM30.656 17.344h-8c-0.352 0-0.64 0.288-0.64 0.64v8c0 0.384 0.288 0.672 0.64 0.672h8c0.384 0 0.672-0.288 0.672-0.672v-8c0-0.352-0.288-0.64-0.672-0.64zM30.016 25.344h-6.688v-6.688h6.688v6.688zM29.344 28h-5.344c-0.352 0-0.672 0.288-0.672 0.672s0.32 0.672 0.672 0.672h5.344c0.352 0 0.672-0.32 0.672-0.672s-0.32-0.672-0.672-0.672z"></path></svg>',
		'location' => 'kenta_archive',
	],
	[
		'label'    => __( 'Sidebar Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M31.328 0h-30.656c-0.384 0-0.672 0.288-0.672 0.672v30.656c0 0.384 0.288 0.672 0.672 0.672h30.656c0.384 0 0.672-0.288 0.672-0.672v-30.656c0-0.384-0.288-0.672-0.672-0.672zM30.656 1.344v5.312h-29.312v-5.312h29.312zM1.344 8h17.312v22.656h-17.312v-22.656zM20 30.656v-22.656h10.656v22.656h-10.656zM27.328 26.656h-4c-0.352 0-0.672 0.32-0.672 0.672s0.32 0.672 0.672 0.672h4c0.384 0 0.672-0.288 0.672-0.672s-0.288-0.672-0.672-0.672zM27.328 22.656h-4c-0.352 0-0.672 0.32-0.672 0.672s0.32 0.672 0.672 0.672h4c0.384 0 0.672-0.288 0.672-0.672s-0.288-0.672-0.672-0.672zM27.328 18.656h-4c-0.352 0-0.672 0.32-0.672 0.672s0.32 0.672 0.672 0.672h4c0.384 0 0.672-0.288 0.672-0.672s-0.288-0.672-0.672-0.672zM27.328 14.656h-4c-0.352 0-0.672 0.32-0.672 0.672s0.32 0.672 0.672 0.672h4c0.384 0 0.672-0.288 0.672-0.672s-0.288-0.672-0.672-0.672zM27.328 10.656h-4c-0.352 0-0.672 0.32-0.672 0.672s0.32 0.672 0.672 0.672h4c0.384 0 0.672-0.288 0.672-0.672s-0.288-0.672-0.672-0.672z"></path></svg>',
		'location' => 'kenta_global:kenta_global_sidebar_section',
	],
	[
		'label'    => __( 'Copyright Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 20.016q3.281 0 5.648-2.367t2.367-5.648-2.367-5.648-5.648-2.367-5.648 2.367-2.367 5.648 2.367 5.648 5.648 2.367zM12 2.016q4.125 0 7.055 2.93t2.93 7.055-2.93 7.055-7.055 2.93-7.055-2.93-2.93-7.055 2.93-7.055 7.055-2.93zM11.859 9.141q-1.875 0-1.875 2.719v0.281q0 2.719 1.875 2.719 0.703 0 1.172-0.398t0.469-1.008h1.781q0 1.172-1.031 2.063-0.984 0.844-2.391 0.844-1.875 0-2.859-1.125t-0.984-3.094v-0.281q0-1.922 0.938-3 1.125-1.266 2.906-1.266 1.547 0 2.438 0.891 0.984 0.984 0.984 2.297h-1.781q0-0.328-0.141-0.609-0.234-0.469-0.328-0.563-0.469-0.469-1.172-0.469z"></path></svg>',
		'location' => 'kenta_footer:copyright',
	],
	[
		'label'    => __( 'Social Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M26.656 21.344c-1.824 0-3.456 0.928-4.416 2.368l-11.904-5.952c0.192-0.544 0.32-1.152 0.32-1.76s-0.128-1.216-0.32-1.76l11.904-5.952c0.96 1.44 2.592 2.368 4.416 2.368 2.944 0 5.344-2.368 5.344-5.312s-2.4-5.344-5.344-5.344-5.312 2.4-5.312 5.344c0 0.608 0.128 1.184 0.32 1.76l-11.904 5.92c-0.96-1.408-2.592-2.368-4.416-2.368-2.944 0-5.344 2.4-5.344 5.344s2.4 5.344 5.344 5.344c1.824 0 3.456-0.96 4.416-2.4l11.904 5.952c-0.192 0.576-0.32 1.152-0.32 1.76 0 2.944 2.368 5.344 5.312 5.344s5.344-2.4 5.344-5.344-2.4-5.312-5.344-5.312zM26.656 1.344c2.208 0 4 1.792 4 4s-1.792 4-4 4c-1.536 0-2.88-0.928-3.552-2.208 0-0.032 0-0.032 0-0.032s0 0 0 0c-0.256-0.544-0.448-1.12-0.448-1.76 0-2.208 1.792-4 4-4zM5.344 20c-2.208 0-4-1.792-4-4s1.792-4 4-4c1.536 0 2.88 0.896 3.552 2.208 0 0 0 0 0 0s0 0 0 0c0.288 0.544 0.448 1.152 0.448 1.792s-0.16 1.216-0.448 1.76c0 0 0 0 0 0.032 0 0 0 0 0 0-0.672 1.312-2.016 2.208-3.552 2.208zM26.656 30.656c-2.208 0-4-1.792-4-4 0-0.64 0.192-1.216 0.448-1.76 0 0 0 0 0 0s0 0 0-0.032c0.672-1.28 2.016-2.208 3.552-2.208 2.208 0 4 1.792 4 4s-1.792 4-4 4z"></path></svg>',
		'location' => 'kenta_global:kenta_global_socials',
	],
	[
		'label'    => __( 'Scroll Top Settings', 'kenta' ),
		'icon'     => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M15.36 6.688c0.352-0.352 0.928-0.352 1.28 0l4.416 4.416c0.576 0.544 0.16 1.472-0.608 1.472h-2.72v16.288c-0.096 0.992-0.832 1.792-1.728 1.792h-0.16c-0.896-0.096-1.568-0.96-1.568-1.984v-16.096h-2.72c-0.768 0-1.184-0.928-0.608-1.472l4.416-4.416zM29.344 0.928c0.96 0 1.728 0.768 1.728 1.728s-0.768 1.728-1.728 1.728h-26.688c-0.96 0-1.728-0.768-1.728-1.728s0.768-1.728 1.728-1.728h26.688z"></path></svg>',
		'location' => 'kenta_global:kenta_global_scroll_top',
	],
] );
?>

<div class="customizer-items">
	<?php foreach ( $customizer_items as $item ): ?>
        <div class="customizer-item-wrap">
            <a class="customizer-item"
               target="_blank"
               href="<?php echo esc_url( Utils::customizer_url( $item['location'] ) ) ?>">
                <div class="customizer-item-icon">
					<?php echo kenta_kses( $item['icon'] ); ?>
                </div>
                <span class="item-label"><?php echo esc_html( $item['label'] ); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M502.6 278.6l-128 128c-12.51 12.51-32.76 12.49-45.25 0c-12.5-12.5-12.5-32.75 0-45.25L402.8 288H32C14.31 288 0 273.7 0 255.1S14.31 224 32 224h370.8l-73.38-73.38c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l128 128C515.1 245.9 515.1 266.1 502.6 278.6z"/>
                </svg>
            </a>
        </div>
	<?php endforeach; ?>
</div>