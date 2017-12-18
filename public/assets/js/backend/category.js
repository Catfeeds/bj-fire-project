define(['jquery', 'bootstrap', 'backend', 'table', 'form', 'template'], function ($, undefined, Backend, Table, Form, Template) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'category/index',
                    add_url: 'category/add',
                    edit_url: 'category/edit',
                    del_url: 'category/del',
                    multi_url: 'category/multi',
                    table: 'category',
                }
            });

            var table = $("#table");

            //在普通搜索提交搜索前
            table.on('common-search.bs.table', function (event, table, params, query) {
                //这里可以对params值进行修改,从而影响搜索条件
                params.filter = JSON.parse(params.filter);
                params.op = JSON.parse(params.op);

                // 判断联动选择项是否选择，进行有增/删
                if($.trim($("select[name='pid1']").val())!=''){
                    params.filter['pid'] = $.trim($("select[name='pid1']").val());
                    params.op['pid'] = "=";
                }
                if($.trim($("select[name='pid2']").val())!=''){
                    params.filter['pid'] = $.trim($("select[name='pid2']").val());
                    params.op['pid'] = "=";
                }
                if($.trim($("select[name='pid3']").val())!=''){
                    params.filter['pid'] = $.trim($("select[name='pid3']").val());
                    params.op['pid'] = "=";
                }
                if($.trim($("select[name='pid4']").val())!=''){
                    params.filter['pid'] = $.trim($("select[name='pid4']").val());
                    params.op['pid'] = "=";
                }

                params.filter = JSON.stringify(params.filter);
                params.op = JSON.stringify(params.op);

                return params;
            });

            //在普通搜索渲染后
            table.on('post-common-search.bs.table', function (event, table) {
                $("input[name='title']").addClass("selectpage").data("source", "auth/adminlog/selectpage").data("primaryKey", "title").data("field", "title").data("orderBy", "id desc");
                Form.events.cxselect($("form", table.$commonsearch));
                Form.events.selectpage($("form", table.$commonsearch));
            });

            //在表格内容渲染完成后回调的事件
            table.on('post-body.bs.table', function (e, settings, json, xhr) {

            });

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                escape: false,
                pk: 'id',
                pagination: false,
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id'), operate: false},
                        {field: 'pid', title: __('Pid'), searchList: function () {
                            return Template('categorytpl', {});
                        }},
                        {field: 'type_text', title: __('Type'), operate: false},
                        {field: 'name', title: __('Name'), align: 'left', operate: false},
                        {field: 'accounted', title: __('Accounted'), operate: false},
                        {field: 'status', title: __('Status'), operate: false, formatter: Table.api.formatter.status},
                        {field: 'weigh', title: __('Weigh'), operate: false},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ],
                queryParams: function (params) {
                    params.filter = JSON.stringify(params.filter);
                    params.op = JSON.stringify(params.op);
                    return params;
                },
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                $(document).on("change", "#c-type", function () {
                    $("#c-pid option[data-type='all']").prop("selected", true);
                    $("#c-pid option").removeClass("hide");
                    $("#c-pid option[data-type!='" + $(this).val() + "'][data-type!='all']").addClass("hide");
                    $("#c-pid").selectpicker("refresh");
                });
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});