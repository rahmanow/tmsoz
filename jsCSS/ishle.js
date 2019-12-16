var islem = function() {
    $('#gozlenyar').show();
    $.ajax({
        type: "GET",
        url: "./al.php?name=" + encodeURI($('input:text').val()),
        dataType: "text",
        //data: ({ name: encodeURI($('input:text').val()) }), // here we def wich variabe is assiciated
        contentType: "application/x-www-form-urlencoded;charset=UTF-8",
        beforeSend: function(xhr) {
            xhr.setRequestHeader('Accept', "text/html; charset=utf-8");
        },
        success: function(cevap) {
            $('#result').html(cevap);
            $('#gozlenyar').hide();
        }
    });
}


$(function() {
    $.get("addmin/sozler.txt", function(data) {
        var allPlayers = data.split('\n');

        $("#input").autocomplete({
            source: function(request, response) {
                var results = new RegExp('^' + request.term, 'i');
                response(

                    $.grep( //an item from availableTags array 
                        allPlayers,
                        //return true if a term is found in item,  
                        //else false if not. but... 
                        //return false too if term string is less than 2 characters length 
                        function(item) {
                            if (request.term.length < 1)
                                return false;
                            else
                                return results.test(item);
                        }
                    ).slice(0, 8),

                ); // Display the first 10 results
            }
        });

        /* $('#tmkb a').click(function(event) {
            event.preventDefault();
            var input = $('#input').val() + $(this).text();
            $('#input').typeahead('val', input);
            $('#input').focus();
        }) */

        $('.ui-autocomplete').click(function() {
            islem();
        });

        $('#input').keypress(function(event) {
            if (event.keyCode == '13') {
                islem();
                $('.ui-autocomplete').hide();
            }
        });
    });
});


if (typeof Object.create !== 'function') {
    Object.create = function(obj) {
        function _O() {};
        _O.prototype = obj;
        return new _O();

    }

};
(function($, window, document, undefined) {
    'use strict';

    var _Elimore = {
        init: function(options, el) {
            var self = this;
            self.el = el;
            self.$el = $(el);
            // Store the length text of each element;
            self.$lengthtext = self.$el.text().length;
            self.options = $.extend({}, $.fn.elimore.options, options);


            // Check The Length Text
            if (self.$lengthtext >= self.options.maxLength) {
                self.ellipsis();
            } else {
                return self;
            }


        },
        ellipsis: function() {

            var self = this;

            //self.$elimore_toggle = $("._elimore_toggle");

            if (self.options.dataUrl) {

                var fullTxt = self.$el.text(),
                    text_one = fullTxt.substr(0, self.options.maxLength),
                    dataUrl = self.$el.data("url");

                console.log(dataUrl);
                var more_btn = '<a href="' + dataUrl + '">' + self.options.moreText + '</a>';

                self.$el.html("");

                self.$el.append(text_one + more_btn);

            } else {

                var fullTxt = self.$el.text(),
                    text_one = fullTxt.substr(0, self.options.maxLength),
                    text_two = fullTxt.substr(self.options.maxLength, self.$lengthtext);

                var more_btn = '<a class="elimore_show">' + self.options.moreText + '</a>',
                    less_btn = '<a class="elimore_hide" style="display:none;">' + self.options.lessText + '</a>';

                if (self.options.showOnly) {
                    less_btn = '';
                }

                self.$el.html("");
                if (self.options.trimOnly) {
                    self.$el.append(text_one);
                } else {
                    self.$el.append(text_one + '<span class="elimore_trim" style="display:none">' + text_two + '</span>' + more_btn + less_btn);
                }


                self._toggle_ellipsis();

            }




        },
        _toggle_ellipsis: function() {
            var self = this;

            self.$show_btn = self.$el.children().find("a.elimore_show");

            // Toggle Show Hide For Ellipsis Text
            self.$el.on("click", ".elimore_show", function() {
                self.$el.children().toggle();
            });
            self.$el.on("click", ".elimore_hide", function() {
                self.$el.children().toggle();
            });
        }

    }

    $.fn.elimore = function(options) {
        return this.each(function() {
            var em = Object.create(_Elimore);
            em.init(options, this);
        });
    };

    $.fn.elimore.options = {
        maxLength: 130,
        moreText: "More View",
        lessText: "Less View",
        showOnly: false,
        dataUrl: false,
        trimOnly: false
    };


})(jQuery, window, document);

$(document).ready(function() {
    $('#tmkb a').click(function(event) {
        event.preventDefault();
        var input = $('#input').val() + $(this).text();
        $('#input').typeahead('val', input);
        $('#input').focus();
    })
});