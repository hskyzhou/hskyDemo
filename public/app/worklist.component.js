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
var WorklistComponent = (function () {
    function WorklistComponent(workService) {
        this.workService = workService;
        this.worklist = [];
    }
    WorklistComponent.prototype.ngOnInit = function () {
        var _this = this;
        this.workService.getWork().then(function (worklist) { return _this.worklist = worklist; });
    };
    WorklistComponent = __decorate([
        core_1.Component({
            moduleId: module.id,
            selector: 'my-worklist',
            templateUrl: "worklist.component.html"
        }), 
        __metadata('design:paramtypes', [work_service_1.WorkService])
    ], WorklistComponent);
    return WorklistComponent;
}());
exports.WorklistComponent = WorklistComponent;

//# sourceMappingURL=worklist.component.js.map
