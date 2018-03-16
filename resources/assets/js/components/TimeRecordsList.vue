<template lang="pug">
section#time_records
  table.table
    tr
      th レコード数
      td {{ amount }}
    tr
      th 合計時間
      td {{ sum }}
  table.table
    thead
      tr
        th 日付
        th 開始
        th 終了
        th 時間
        th プロジェクト
    tbody
      tr(v-for="record in records")
        td {{ record.date }}
        td {{ record.start_at }}
        td {{ record.end_at }}
        td {{ record.diff }}
        td {{ record.project_name }}
</template>

<script>
    var moment = require('moment');
    export default {
        data() {
            return {
                records: [],
                amount: 0,
                sum: '',
            }
        },
        mounted() {
            console.log('Component mounted.')
            var endpoint = '/api/time_records/';
            $.ajax({
                url: endpoint,
                dataType: 'json',
            }).then(
                data => {
                    this.data = data;
                    this.setTimeRecords();
                    this.setSum();
                },
                error => console.log('error')
            )
        },
        methods: {
            setTimeRecords() {
                var _this = this;
                Object.keys(_this.data.time_records).forEach(function(i) {
                    var start_at = moment(this[i].start_at);
                    var date = start_at.format('YYYY/M/D');
                    var end_at = this[i].end_at ? moment(this[i].end_at) : '';
                    var diff = '';
                    if(end_at) {
                        diff = moment.utc(end_at.diff(start_at)).format('H:mm');
                        end_at = end_at.format('H:mm');
                    }
                    start_at = start_at.format('H:mm');
                    _this.records.push({
                                date: date,
                            start_at: start_at,
                              end_at: end_at,
                                diff: diff,
                        project_name: _this.data.projects[this[i].project_id - 1].name,
                    })
                }, this.data.time_records);
                this.amount = this.records.length;
            },
            setSum() {
                var sum = 0;
                Object.keys(this.data.time_records).forEach(function(i) {
                    if(!this[i].end_at) return;
                    sum -= new Date(this[i].start_at).getTime();
                    sum += new Date(this[i].end_at).getTime();
                }, this.data.time_records);
                sum /= 1000;
                var h = Math.floor(sum/3600);
                var i = Math.floor((sum%3600)/60);
                if (i<10) i = '0' + i;
                this.sum = h + ':' + i;
            }
        }
    }
</script>
