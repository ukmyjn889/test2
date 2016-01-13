package com.action;

import com.javabean.Course;
import com.opensymphony.xwork2.ActionSupport;
import com.service.CourseService;

public class CourseAction extends ActionSupport{
	private String cid;
	private String title;
	private double credits;
	private String prerequisites;
	private String offering;
	private String lab;
	private String cidL;
	private String titleL;
	private double creditsL;
	private String prerequisitesL;
	private String offeringL;
	private String labL;
	public String getCidL() {
		return cidL;
	}
	public void setCidL(String cidL) {
		this.cidL = cidL;
	}
	public String getTitleL() {
		return titleL;
	}
	public void setTitleL(String titleL) {
		this.titleL = titleL;
	}
	public double getCreditsL() {
		return creditsL;
	}
	public void setCreditsL(double creditsL) {
		this.creditsL = creditsL;
	}
	public String getPrerequisitesL() {
		return prerequisitesL;
	}
	public void setPrerequisitesL(String prerequisitesL) {
		this.prerequisitesL = prerequisitesL;
	}
	public String getOfferingL() {
		return offeringL;
	}
	public void setOfferingL(String offeringL) {
		this.offeringL = offeringL;
	}
	public String getLabL() {
		return labL;
	}
	public void setLabL(String labL) {
		this.labL = labL;
	}
	public CourseService getCs() {
		return cs;
	}
	public void setCs(CourseService cs) {
		this.cs = cs;
	}
	CourseService cs=new CourseService();
	public String getCid() {
		return cid;
	}
	public void setCid(String cid) {
		this.cid = cid;
	}
	public String getTitle() {
		return title;
	}
	public void setTitle(String title) {
		this.title = title;
	}
	public double getCredits() {
		return credits;
	}
	public void setCredits(double credits) {
		this.credits = credits;
	}
	public String getPrerequisites() {
		return prerequisites;
	}
	public void setPrerequisites(String prerequisites) {
		this.prerequisites = prerequisites;
	}
	public String getOffering() {
		return offering;
	}
	public void setOffering(String offering) {
		this.offering = offering;
	}
	public String getLab() {
		return lab;
	}
	public void setLab(String lab) {
		this.lab = lab;
	}
	public String execute(){
		Course course=new Course();
		if(cid==null||credits==0||title==null){
			return INPUT;
		}
		course.setCid(cid);
		course.setCredits(credits);
		course.setLab(lab);
		course.setOffering(offering);
		course.setPrerequisites(prerequisites);
		course.setTitle(title);
		if(cs.saveCourse(course)){
			if(!course.getLab().equals("no")){
				Course course1=new Course();
				course1.setCid(cidL);
				course1.setCredits(creditsL);
				course1.setLab(labL);
				course1.setOffering(offeringL);
				course1.setPrerequisites(prerequisitesL);
				course1.setTitle(titleL);
				if(cid==null||credits==0||title==null){
					return INPUT;
				}
				if(cs.saveCourse(course1)){
					return SUCCESS;
				}else{
					return INPUT;
				}
			}
		return SUCCESS;
		}else{
			return INPUT;
		}
	}
}
