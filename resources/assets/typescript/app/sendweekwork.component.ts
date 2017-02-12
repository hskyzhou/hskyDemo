import { Component, OnInit } from '@angular/core';

import { Work } from './work';

import { WorkService} from './work.service';

@Component({
	moduleId : module.id,
	selector: 'my-sendweekwork',
	templateUrl : "sendweekwork.component.html"
})

export class SendWeekWorkComponent implements OnInit{
	weekWork = {
		"sender" : "",
		"cc" : "",
	};

	constructor(private workService : WorkService){

	}

	ngOnInit() : void{
		// this.workService.getRecentWork().then(worklist => {
		// 	// console.log(this.worklist);
		// 	this.workListKeys = Object.keys(worklist);
		// 	this.worklist = worklist;
		// });
	}

	send() : void{
		this.workService.sendWeekWork(this.weekWork).then(result => {
			alert(result.message)
		});
	}
} 