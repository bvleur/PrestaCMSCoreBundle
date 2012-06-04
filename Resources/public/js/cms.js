/**
 * CMSContent : Manage CMS content administration for themes and pages
 * 
 * @package    PrestaCMS
 * @subpackage CoreBundle
 * @author     Nicolas Bastien nbastien@prestaconcept.net
 */
var CMSContent = function() {
    
    /**
     * Url for bloc edition
     */
    var _editBlocUrl;
    
    /**
     * Url for block rendering
     */
    var _renderBlockUrl;   
   
    return {
        /**
         * Initialisation
         */
        init : function (editBlocUrl, renderBlockUrl) {
            this._editBlocUrl = editBlocUrl;
            this._renderBlockUrl = renderBlockUrl;
            
            $('a.action-edit').click(function(e) {
                e.preventDefault();
                CMSContent.editBlock($(this).attr('block-id'));                    
            });
        },
        /**
         * Return url for block rendering
         */
        getRenderBlocUrl : function () {
            return this._renderBlockUrl;
        },
        /**
         * Handle block edit button click
         * Load Modal Edition
         */
        editBlock : function (blockId) {
            $('#modal-loader').show();
            $('#modal-content').html('');
            $('#modal-content').hide();
            $('#modal').modal('show');
            
            $('#modal-content').load(this._editBlocUrl + '/' + blockId, function() {
                CMSContent.initCkEditor();
                $('#modal-content div.form-actions').remove();
                $('#modal-loader').hide();
                $('#modal-content').show();
            });
        },
        /**
         * Initialze CkEditor
         */
        initCkEditor : function () {
            $('.ckeditor').each(function() {
                CKEDITOR.replace($(this).attr('id'), {});
            })
        },
        /**
         * Submit Modal Edition form and update content
         */
        submitModalForm : function () {
            $('#modal-content').hide();
            $('#modal-loader').show();
            //update ckeditor content : inject from ckeditor to form input
            for ( instance in CKEDITOR.instances ) {
                CKEDITOR.instances[instance].updateElement();
            }
            $.ajax({
                url: $('#modal form').attr('action'),
                type: "POST",
                data: $('#modal form').serialize()
            }).done(function( html ) {
                //If succesfull we only get a return code in JSON
                if (html.result != undefined) {                    
                    var $editors = $("textarea.ckeditor");
                    if ($editors.length) {
                        $editors.each(function() {
                            var instance = CKEDITOR.instances[$(this).attr("id")];
                            if (instance) { 
                                delete CKEDITOR.instances[$(this).attr("id")];
                            }
                        });
                    }
                    $('#modal-content').html('');
                    $('#modal').modal('hide');
                    CMSContentInit();
                    $('#block-content-' + html.objectId).load(CMSContent.getRenderBlocUrl() + '/' + html.objectId, function() {
                        $('#block-content-' + html.objectId).effect("highlight", {}, 3000);
                    });
                } else {
                    //If an error occurs, we rediplay the form
                    $('#modal-content').html(html);
                    $('#modal-loader').hide();
                    $('#modal-content').show();
                }
            });
        }    
    }
}();