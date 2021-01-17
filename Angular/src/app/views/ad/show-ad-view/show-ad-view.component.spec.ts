import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ShowAdViewComponent } from './show-ad-view.component';

describe('ShowAdViewComponent', () => {
  let component: ShowAdViewComponent;
  let fixture: ComponentFixture<ShowAdViewComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ShowAdViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ShowAdViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
