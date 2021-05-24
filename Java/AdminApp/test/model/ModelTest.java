/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import model.Model;
import java.sql.Connection;
import java.util.ArrayList;
import javax.swing.JComboBox;
import junit.framework.TestCase;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author arambarri.oihana
 */
public class ModelTest extends TestCase {
    Model m1;
    Member m2;
    Member m3;
    Reserve r1;
    Reserve r2;
    Purchase p1;
    Purchase p2;
    Lata l1;
    Lata l2;
    Inventary i1;
    Inventary i2;
    public ModelTest() {
        setUp();
    }
    @Override
    public void setUp() {
       m1=new Model();
       m2=new Member("341","34523","","","",false,0.0,0.0,"");
       m3=new Member("342","3456","","","",false,0.0,0.0,"");
       r1=new Reserve("","2020-01-10",0,"");
       r2=new Reserve("","2021-01-10",1,"");
       p1=new Purchase(0,0,0.0,0);
       p2=new Purchase(1,1,1.1,1);
       l1=new Lata(3,"700");
       l2=new Lata(4,"800");
       i1=new Inventary(1,"",1);
       i2=new Inventary(2,"",2);
    }

    /**
     * Test of addMember method, of class Model.
     */
    @Test
    public void testAddMember() {
        int expResult = 1;
        int result = Model.addMember(m3);
        int result1 = Model.addMember(m2);
        assertEquals(expResult, result);
        assertEquals(expResult, result1);
        testDeleteMember();
    }
    /**
     * Test of deleteReserve method, of class Model.
     */
    @Test
    public void testDeleteMember() {
       Model.deleteMember(m3);
    }
//    /**
//     * Test of addPurchase method, of class Model.
//     */
//    @Test
//    public void testAddPurchase() {
//        int expResult = 1;
//        int result = Model.addPurchase(p1);
//        int result1 = Model.addPurchase(p2);
//        assertEquals(expResult, result);
//        assertEquals(expResult, result1);
//        testDeletePurchase();
//    }
//    /**
//     * Test of deletePurchase method, of class Model.
//     */
//    @Test
//    public void testDeletePurchase() {
//       Model.deletePurchase(p1);
//    }
//    /**
//     * Test of deleteLatas method, of class Model.
//     */
//     @Test
//    public void testAddLatas() {
//        int expResult = 1;
//        int result = Model.addLatas(l1);
//        int result1 = Model.addLatas(l2);
//        assertEquals(expResult, result);
//        assertEquals(expResult, result1);
//        testDeleteLatas();
//    }
//    /**
//     * Test of deleteLatas method, of class Model.
//     */
//    @Test
//    public void testDeleteLatas() {
//       Model.deleteLatas(l2);
//    }
//    /**
//     * Test of addInventary method, of class Model.
//     */
//
//    @Test
//    public void testAddInventary() {
//        int expResult = 1;
//        int result = Model.addInventary(i1);
//        int result1 = Model.addInventary(i2);
//        assertEquals(expResult, result);
//        assertEquals(expResult, result1);
//        testDeleteLatas();
//    }
//    /**
//     * Test of deleteInventary method, of class Model.
//     */
//    @Test
//    public void testDeleteInventary() {
//       Model.deleteInventary(i1);
//    }
    
    

    
    
    
    
    
    
}
