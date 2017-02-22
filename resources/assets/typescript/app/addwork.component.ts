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
		this.workService.addWork(this.work).then(res => {
			let addedWork = res.work as Work;
			if(res.result){
				this.worklist.push(addedWork);
			}
		});
		this.resetWork();
	}


} 