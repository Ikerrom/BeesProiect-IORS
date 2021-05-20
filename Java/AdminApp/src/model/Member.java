/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

/**
 *
 * @author arambarri.oihana
 */
public class Member {
    /**
     * Private atributes
     */
    private String dni;
    private String name;
    private String surname;
    private String gmail;
    private String password;
    private boolean admin;
    private double moneyToPay;
    private double moneyInAccount;
    private String photo;
    /**
     * Constructor
     * @param dni dni of member
     * @param name name of member
     * @param surname surname of member
     * @param gmail gmail of member
     * @param password password of member
     * @param admin member is admin yes or no
     * @param moneyToPay money to pay member
     * @param moneyInAccount money in account member
     * @param photo photo url of member
     */
    public Member(String dni, String name, String surname, String gmail, String password, boolean admin, double moneyToPay, double moneyInAccount,String photo) {
        this.dni = dni;
        this.name = name;
        this.surname = surname;
        this.gmail = gmail;
        this.password = password;
        this.admin = admin;
        this.moneyToPay = moneyToPay;
        this.moneyInAccount = moneyInAccount;
        this.photo=photo;
    }
    /**
     * Constructor
     * @param dni dni of member
     * @param password  password of member
     */
    public Member(String dni,String password){
        this.dni = dni;
        this.password = password;
    }

    public Member() {
    }
    
    /**
     * 
     * @return dni of member
     */
    public String getDni() {
        return dni;
    }
    /**
     * 
     * @param dni Sets the dni to the given value
     */
    public void setDni(String dni) {
        this.dni = dni;
    }
    /**
     * 
     * @return name of member
     */
    public String getName() {
        return name;
    }
    /**
     * 
     * @param name Sets the name to the given value 
     */
    public void setName(String name) {
        this.name = name;
    }
    /**
     * 
     * @return surname of member
     */
    public String getSurname() {
        return surname;
    }
    /**
     * 
     * @param surname Sets the surname to the given value 
     */
    public void setSurname(String surname) {
        this.surname = surname;
    }
    /**
     * 
     * @return gmail of member
     */
    public String getGmail() {
        return gmail;
    }
    /**
     * 
     * @param gmail Sets the gmail to the given value
     */
    public void setGmail(String gmail) {
        this.gmail = gmail;
    }
    /**
     * 
     * @return password of member
     */
    public String getPassword() {
        return password;
    }
    /**
     * 
     * @param password Sets the password to the given value
     */
    public void setPassword(String password) {
        this.password = password;
    }
    /**
     * 
     * @return admin yes or no 
     */
    public boolean isAdmin() {
        return admin;
    }
    /**
     * 
     * @param admin Sets the admin  to the given value
     */
    public void setAdmin(boolean admin) {
        this.admin = admin;
    }
    /**
     * 
     * @return money to pay the member
     */
    public double getMoneyToPay() {
        return moneyToPay;
    }
    /**
     * 
     * @param moneyToPay Sets the money to pay the member to the given value
     */
    public void setMoneyToPay(double moneyToPay) {
        this.moneyToPay = moneyToPay;
    }
    /**
     * 
     * @return money in account
     */
    public double getMoneyInAccount() {
        return moneyInAccount;
    }
    /**
     * 
     * @param moneyInAccount Sets the money in account to the given value
     */
    public void setMoneyInAccount(double moneyInAccount) {
        this.moneyInAccount = moneyInAccount;
    }
    /**
     * 
     * @return url photo
     */
    public String getPhoto() {
        return photo;
    }
    /**
     * 
     * @param photo Sets the Url photo to the given value
     */
    public void setPhoto(String photo) {
        this.photo = photo;
    }

    @Override
    public String toString() {
        return  dni;
    }
    public String toString1() {
        return "Member{" + "dni=" + dni + ", name=" + name + ", surname=" + surname + ", gmail=" + gmail + ", password=" + password + ", admin=" + admin + ", moneyToPay=" + moneyToPay + ", moneyInAccount=" + moneyInAccount + ", photo=" + photo + '}';
    }

    
    
    
}
