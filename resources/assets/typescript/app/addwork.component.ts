import { Component } from '@angular/core';

import { Work } from './work';

import { WorkService} from './work.service';

@Component({
	moduleId : module.id,
	selector: 'my-add-work',
	templateUrl : "addwork.component.html"
})

export class AddWorkComponent{
	work : Work = new Work();
	worklist : Work[] = [];

	constructor(private workService : WorkService){
		this.resetWork();
	}

	resetWork(): void{
		this.work = {
			"name" : "",
			"belong_project" : "",
		}
	}
	ngOnInit() : void{
		this.workService.getWork().then(workList => {
			this.worklist = workList;
		});
	}

	addWork() : void{
		console.log(this.work);
		this.worklist.push(this.work);
		this.workService.addWork(this.work);
		this.resetWork();
	}


} 