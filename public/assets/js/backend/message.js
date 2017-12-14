define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'message/index',
                    add_url: 'message/add',
                    edit_url: 'message/edit',
                    del_url: 'message/del',
                    multi_url: 'message/multi',
                    table: 'message',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'type', title: __('Type'), formatter: Controller.api.formatter.type},
                        {field: 'time_text', title: __('Time')},
                        {field: 'time_start', title: __('Time_start')},
                        {field: 'time_end', title: __('Time_end')},
                        {field: 'time_status', title: __('Time_status'), formatter: Table.api.formatter.status},
                        {field: 'text', title: __('Text')},
                        {field: 'text_status', title: __('Text_status'), formatter: Table.api.formatter.status},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
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
                Form.api.bindevent($("form[role=form]"));
            },
            formatter: {
                type: function (value, row, index) {
                    if (value == '1'){
                        return '<span class="label label-danger">消防员</span>';
                    }else{
                        return '<span class="label label-success">消防工程师</span>';
                    }
                }
            }
        }
    };
    return Controller;
});