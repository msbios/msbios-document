var MSBios\Document = function () {

    return {
        /**
         *
         * @param tmpls
         */
        initDocumentType: function (tmpls) {
            var forms = {
                $property: $('#property-modal-form-add'),
                $tab: $('#tab-modal-form-add')
            };

            // Event on hide
            forms.$tab.on('show.bs.modal', function(e){
                $(this).find('input[name="name"]').val('');
                $(this).find('input[name="description"]').val('');
            });

            var containers = {
                $propertyTabs: $('#tab-properties .tabbable'),
                $tabs: $("#tab-tabs .table > tbody")
            }

            var counters = {
                properties: $('.property-item').length,
                tabs: $('tr', containers.$tabs).length
            };

            $('.btn-primary', forms.$property).click(function(){

                var item = counters.properties++;
                var tabId = $('select[name="tab_id"]', forms.$property).val()

                tmpls.$property.tmpl({
                    tabId: tabId,
                    item: item,
                    name: $('input[name="name"]', forms.$property).val(),
                    identifier: $('input[name="identifier"]', forms.$property).val(),
                    dataTypeId: $('input[name="datatype_id"]', forms.$property).val(),
                    description: $('input[name="description"]', forms.$property).val(),
                    required: $('input[name="required"]', forms.$property).val(),
                }).appendTo('#accordion-controls-' + tabId);

                forms.$property.modal('hide');
            });

            $('.btn-primary', forms.$tab).click(function(){

                var item = counters.tabs++,
                    name= $('input[name="name"]', forms.$tab).val();

                tmpls.$tabHeader.tmpl({
                    item: item,
                    name: name
                }).appendTo($('.nav', containers.$propertyTabs));

                tmpls.$tabContent.tmpl({
                    item: item
                }).appendTo($('.tab-content', containers.$propertyTabs));

                tmpls.$tab.tmpl({
                    item: item,
                    name: name,
                    description: $('input[name="description"]', forms.$tab).val()
                }).appendTo(containers.$tabs);

                forms.$tab.modal('hide');
            });
        }
    }
}();