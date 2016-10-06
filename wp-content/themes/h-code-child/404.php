<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package H-Code-Child
 */

get_header();?>
<?php
$title_text          = '<span id="error">Error</span><span id="code"> 404</span>';
$content_text        = '<span id="error-msg"> The Page You Were Expecting Could Not Be Located</span>';
$img                 = hcode_option('404_image');
$image               = ( hcode_option('404_image') ) ? ' style= "background-image: url('.$img['url'].')"' : '';
$button              = ( hcode_option('404_button') ) ? hcode_option('404_button') : __('Go to home page','H-Code');
$button_url          = ( hcode_option('404_button_url') ) ? get_permalink(get_page_by_path( hcode_option('404_button_url') )) : home_url();
$enable_text_button  = hcode_option('404_enable_text_button');
$enable_search       = hcode_option('404_enable_search');


$top_header_class    = '';
$hcode_options       = get_option( 'hcode_theme_setting' );
$hcode_enable_header = (isset($hcode_options['hcode_enable_header'])) ? $hcode_options['hcode_enable_header'] : '';
$hcode_header_layout = (isset($hcode_options['hcode_header_layout'])) ? $hcode_options['hcode_header_layout'] : '';

if($hcode_enable_header == 1 && $hcode_header_layout != 'headertype8')
{
    $top_header_class .= 'content-top-margin';
}
?>
<?php // Start 404 Page Content ?>
<section id="error-404" class="no-padding full-screen wow fadeIn ">
    <div class="container">
        <div class="row">



                        <div id="error-message" class="flex col-nw justify-center align-items-center">

                            <?php echo $title_text; ?>
                            <?php echo $content_text; ?>


                            <div class="not-found-search-box">
                                <?php if( $enable_text_button == 1 ): ?>
                                    <a class="btn-small-white btn btn-medium no-margin-right" href="<?php echo $button_url;?>"><?php echo $button; ?></a>
                                <?php endif; ?>
                                <?php if( $enable_text_button == 1 && $enable_search == 1 ): ?>
                                    <div class="not-found-or-text"><?php echo __('or', 'H-Code'); ?></div>
                                <?php endif; ?>
                                <?php if( $enable_search == 1 ): ?>
                                    <?php echo get_search_form( ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
<script>
 (function () {
    (function (e) {
        'use strict';
        var t = function (t, n) {
            this._el = e(t);
            if (this.repeat())
                return true;
            this._settings = n;
            this._powerOn = false;
            this._loopTimeout = 0;
            this._el.html(this.buildHTML());
            this._items = this._el.find('span.novacancy');
            this._blinkArr = this.arrayMake();
            this.bindEvent();
            this.writeCSS();
            if (this._settings.autoOn)
                this.blinkOn();
        };
        t.prototype.repeat = function () {
            var e = this._el;
            if (e[0].novacancy) {
                return true;
            } else {
                e[0].novacancy = true;
                return false;
            }
        };
        t.prototype.writeCSS = function () {
            var t = this.css();
            var n = e('<style>' + t + '</style>');
            e('body').append(n);
        };
        t.prototype.selector = function () {
            var e = this._el;
            var t = e[0].tagName;
            if (e[0].id)
                t += '#' + e[0].id;
            if (e[0].className)
                t += '.' + e[0].className;
            return t;
        };
        t.prototype.css = function () {
            var e = this.selector();
            var t = this._settings;
            var n = 'text-shadow: ' + t.glow.toString() + ';';
            var r = 'color: ' + t.color + ';' + n;
            var i = 'color: ' + t.color + '; opacity: 0.3;';
            var s = '';
            s += e + ' .novacancy.on { ' + r + ' }' + '\n';
            s += e + ' .novacancy.off { ' + i + ' }' + '\n';
            return s;
        };
        t.prototype.rand = function (e, t) {
            return Math.floor(Math.random() * (t - e + 1) + e);
        };
        t.prototype.isNumber = function (e) {
            return !isNaN(parseFloat(e)) && isFinite(e);
        };
        t.prototype.blink = function (e) {
            var t = this._settings;
            var n = this;
            this.off(e);
            e[0].blinking = true;
            setTimeout(function () {
                n.on(e);
                e[0].blinking = false;
                n.reblink(e);
            }, this.rand(t.blinkMin, t.blinkMax));
        };
        t.prototype.reblink = function (e) {
            var t = this._settings;
            var n = this;
            setTimeout(function () {
                if (n.rand(1, 100) <= t.reblinkProbability) {
                    n.blink(e);
                }
            }, this.rand(t.blinkMin, t.blinkMax));
        };
        t.prototype.on = function (e) {
            e.removeClass('off').addClass('on');
        };
        t.prototype.off = function (e) {
            e.removeClass('on').addClass('off');
        };
        t.prototype.buildHTML = function () {
            var t = this._el;
            var n = '';
            e.each(t.contents(), function (t, r) {
                if (r.nodeType == 3) {
                    var i = r.nodeValue.split('');
                    e.each(i, function (e, t) {
                        n += '<span class="novacancy on">' + t + '</span>';
                    });
                } else {
                    n += r.outerHTML;
                }
            });
            return n;
        };
        t.prototype.arrayMake = function () {
            var t = this._el;
            var n = this._settings;
            var r = this._items;
            var i = r.length;
            var s = this.randomArray(i);
            var o;
            var u;
            var a = n.off;
            var f = n.blink;
            var l = this;
            a = Math.min(a, i);
            a = Math.max(0, a);
            u = s.splice(0, a);
            e.each(u, function (t, n) {
                l.off(e(r[n]));
            });
            f = f === 0 ? i : f;
            f = Math.min(f, i - a);
            f = Math.max(0, f);
            o = s.splice(0, f);
            return o;
        };
        t.prototype.randomArray = function (e) {
            var t = [];
            var n;
            var r;
            var i;
            for (n = 0; n < e; ++n) {
                if (window.CP.shouldStopExecution(1)) {
                    break;
                }
                t[n] = n;
            }
            window.CP.exitedLoop(1);
            for (n = 0; n < e; ++n) {
                if (window.CP.shouldStopExecution(2)) {
                    break;
                }
                r = parseInt(Math.random() * e, 10);
                i = t[r];
                t[r] = t[n];
                t[n] = i;
            }
            window.CP.exitedLoop(2);
            return t;
        };
        t.prototype.loop = function () {
            if (!this._powerOn)
                return;
            var t = this._el;
            var n = this._settings;
            var r = this._blinkArr;
            var i = this._items;
            if (r.length === 0)
                return;
            var s;
            var o;
            var u = this;
            s = r[this.rand(0, r.length - 1)];
            o = e(i[s]);
            if (!o[0].blinking)
                this.blink(o);
            this._loopTimeout = setTimeout(function () {
                u.loop();
            }, this.rand(n.loopMin, n.loopMax));
        };
        t.prototype.blinkOn = function () {
            if (!this._powerOn) {
                var e = this._settings;
                var t = this;
                this._powerOn = true;
                this._loopTimeout = setTimeout(function () {
                    t.loop();
                }, this.rand(e.loopMin, e.loopMax));
            }
        };
        t.prototype.blinkOff = function () {
            if (this._powerOn) {
                this._powerOn = false;
                clearTimeout(this._loopTimeout);
            }
        };
        t.prototype.bindEvent = function () {
            var e = this._el;
            var t = this;
            e.on('blinkOn', function (e) {
                t.blinkOn();
            });
            e.on('blinkOff', function (e) {
                t.blinkOff();
            });
        };
        var n = function (t) {
            var n = e.extend({
                reblinkProbability: 1 / 3,
                blinkMin: 0.01,
                blinkMax: 0.5,
                loopMin: 0.5,
                loopMax: 2,
                color: 'ORANGE',
                glow: [
                    '0 0 80px Orange',
                    '0 0 30px Red',
                    '0 0 6px Yellow'
                ],
                off: 0,
                blink: 0,
                autoOn: true
            }, t);
            n.reblinkProbability *= 100;
            n.blinkMin *= 1000;
            n.blinkMax *= 1000;
            n.loopMin *= 1000;
            n.loopMax *= 1000;
            return n;
        };
        e.fn.novacancy = function (r) {
            return e.each(this, function (e, i) {
                new t(this, n(r));
            });
        };
    }(jQuery));
    $(function () {
        $('#error').novacancy({
            'reblinkProbability': 0.1,
            'blinkMin': 0.2,
            'blinkMax': 0.6,
            'loopMin': 8,
            'loopMax': 10,
            'color': '#ffffff',
            'glow': [
                '0 0 80px #ffffff',
                '0 0 30px #008000',
                '0 0 6px #0000ff'
            ]
        });
        return $('#code').novacancy({
            'blink': 1,
            'off': 1,
            'color': 'Red',
            'glow': [
                '0 0 80px Red',
                '0 0 30px FireBrick',
                '0 0 6px DarkRed'
            ]
        });
    });
}.call(this));
</script>


        </div>
    </div>
</section>
<?php // End 404 Page Content ?>
<?php get_footer(); ?>