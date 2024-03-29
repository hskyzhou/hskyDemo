"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require('@angular/core');
var work_service_1 = require('./work.service');
var SendWeekWorkComponent = (function () {
    function SendWeekWorkComponent(workService) {
        this.workService = workService;
        this.weekWork = {
            "sender": "",
            "cc": "",
        };
    }
    SendWeekWorkComponent.prototype.ngOnInit = function () {
        // this.workService.getRecentWork().then(worklist => {
        // 	// console.log(this.worklist);
        // 	this.workListKeys = Object.keys(worklist);
        // 	this.worklist = worklist;
        // });
    };
    SendWeekWorkComponent.prototype.send = function () {
        this.workService.sendWeekWork(this.weekWork).then(function (result) {
            alert(result.message);
        });
    };
    SendWeekWorkComponent = __decorate([
        core_1.Component({
            moduleId: module.id,
            selector: 'my-sendweekwork',
            templateUrl: "sendweekwork.component.html"
        }), 
        __metadata('design:paramtypes', [work_service_1.WorkService])
    ], SendWeekWorkComponent);
    return SendWeekWorkComponent;
}());
exports.SendWeekWorkComponent = SendWeekWorkComponent;

//# sourceMappingURL=sendweekwork.component.js.map
